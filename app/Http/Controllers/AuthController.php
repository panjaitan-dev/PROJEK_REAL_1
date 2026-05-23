<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ResetPasswordOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // ============================================================
    // LUPA PASSWORD — Tampilkan form kirim OTP
    // ============================================================
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    // Kirim OTP ke EMAIL admin (tabel: admin)
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admin,email'
        ], [
            'email.exists' => 'Email tidak terdaftar sebagai akun admin.'
        ]);

        // Generate OTP 6 digit
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Hapus OTP lama jika ada
        DB::table('password_otps')->where('email', $request->email)->delete();

        // Simpan OTP baru (berlaku 10 menit)
        DB::table('password_otps')->insert([
            'email'      => $request->email,
            'otp'        => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Kirim kode OTP ke email admin
        try {
            Mail::to($request->email)->send(new ResetPasswordOtpMail($otp, $request->email));

            return redirect()->route('password.otp.form', ['email' => $request->email])
                ->with('success', 'Kode OTP telah dikirim ke ' . $request->email . '. Silakan cek inbox atau folder spam Anda.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email OTP. Error: ' . $e->getMessage()]);
        }
    }

    // Tampilkan halaman verifikasi OTP
    public function showOtpForm(Request $request)
    {
        return view('auth.otp-verify', ['email' => $request->query('email', '')]);
    }

    // Verifikasi OTP dan redirect ke form reset password
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required|digits:6',
        ]);

        $record = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Kode OTP salah. Silakan coba lagi.']);
        }

        if (Carbon::now()->isAfter(Carbon::parse($record->expires_at))) {
            DB::table('password_otps')->where('email', $request->email)->delete();
            return back()->withErrors(['otp' => 'Kode OTP sudah kadaluarsa. Silakan minta kode baru.']);
        }

        // OTP valid — generate token sementara untuk form reset
        $token = Str::random(64);
        DB::table('password_otps')->where('email', $request->email)->update([
            'otp'        => 'VERIFIED_' . $token,   // tandai sudah diverifikasi
            'expires_at' => Carbon::now()->addMinutes(15),
        ]);

        return redirect()->route('password.reset.form', ['token' => $token, 'email' => $request->email]);
    }

    // Tampilkan form reset password (setelah OTP diverifikasi)
    public function showResetForm($token)
    {
        $email = request()->query('email', '');

        $record = DB::table('password_otps')
            ->where('email', $email)
            ->where('otp', 'VERIFIED_' . $token)
            ->first();

        if (!$record || Carbon::now()->isAfter(Carbon::parse($record->expires_at))) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Sesi reset password kadaluarsa. Silakan mulai ulang.']);
        }

        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }

    // Proses reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:admin,email',
            'password' => 'required|min:6|confirmed',
            'token'    => 'required',
        ], [
            'email.exists' => 'Email tidak ditemukan di database admin.'
        ]);

        $record = DB::table('password_otps')
            ->where('email', $request->email)
            ->where('otp', 'VERIFIED_' . $request->token)
            ->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Token tidak valid.']);
        }

        if (Carbon::now()->isAfter(Carbon::parse($record->expires_at))) {
            DB::table('password_otps')->where('email', $request->email)->delete();
            return back()->withErrors(['email' => 'Sesi kadaluarsa. Silakan mulai ulang.']);
        }

        // Update password di tabel admin
        DB::table('admin')->where('email', $request->email)->update([
            'password'   => Hash::make($request->password),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('password_otps')->where('email', $request->email)->delete();

        return redirect()->route('login')
            ->with('success', 'Password berhasil direset! Silakan login dengan password baru Anda.');
    }
}