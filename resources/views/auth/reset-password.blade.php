<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Baru - GeoToba</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #0a2a4a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .wrapper {
            width: 100%;
            max-width: 420px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        .card-header {
            background: #1c1c2e;
            padding: 28px 36px 22px;
            text-align: center;
        }
        .card-header .icon { font-size: 2rem; display: block; margin-bottom: 10px; }
        .card-header h2 {
            color: #fff;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .card-header p {
            color: rgba(255,255,255,0.55);
            font-size: 0.82rem;
        }

        .card-body {
            background: #ffffff;
            padding: 30px 36px 32px;
        }

        /* Stepper */
        .stepper {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin-bottom: 28px;
        }
        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
            position: relative;
        }
        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 17px;
            left: calc(50% + 18px);
            right: calc(-50% + 18px);
            height: 2px;
            background: #c6a43b;
            z-index: 0;
        }
        .step-circle {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem; font-weight: 700;
            position: relative; z-index: 1;
        }
        .step.done   .step-circle { background: #c6a43b; color: #fff; }
        .step.active .step-circle { background: #c6a43b; color: #fff; box-shadow: 0 4px 14px rgba(198,164,59,0.4); }
        .step-label { font-size: 0.68rem; margin-top: 6px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; }
        .step.done   .step-label { color: #c6a43b; }
        .step.active .step-label { color: #c6a43b; }

        /* Form */
        .info-text {
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.65;
            margin-bottom: 22px;
        }

        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }
        .form-group input {
            width: 100%;
            padding: 13px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            color: #1e293b;
            background: #f8fafc;
            transition: all 0.25s;
        }
        .form-group input:focus {
            outline: none;
            border-color: #c6a43b;
            background: #fffdf0;
            box-shadow: 0 0 0 3px rgba(198,164,59,0.15);
        }
        .form-group input[readonly] {
            background: #f1f5f9;
            color: #64748b;
            cursor: not-allowed;
        }
        .form-group input::placeholder { color: #b0bec5; }

        .password-wrap { position: relative; }
        .password-wrap input { padding-right: 46px; }
        .toggle-pw {
            position: absolute; right: 14px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            cursor: pointer; color: #94a3b8; font-size: 1rem;
            transition: color 0.2s;
        }
        .toggle-pw:hover { color: #c6a43b; }

        .strength-bar-wrap {
            margin-top: 8px;
            display: flex;
            gap: 4px;
        }
        .strength-bar-wrap span {
            flex: 1; height: 4px; border-radius: 4px;
            background: #e2e8f0;
            transition: background 0.3s;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: #c6a43b;
            color: #fff;
            border: none;
            border-radius: 50px;
            font-size: 0.88rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 6px;
        }
        .btn:hover {
            background: #b5932d;
            transform: translateY(-2px);
            box-shadow: 0 8px 22px rgba(198,164,59,0.35);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #94a3b8;
            font-size: 0.8rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link:hover { color: #c6a43b; }

        .alert-error {
            background: #fef2f2; border: 1px solid #fca5a5; color: #b91c1c;
            padding: 11px 14px; border-radius: 10px; font-size: 0.83rem; margin-bottom: 18px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="card-header">
        <span class="icon">🔑</span>
        <h2>Lupa Password</h2>
        <p>Buat password baru untuk akun Anda</p>
    </div>

    <div class="card-body">

        {{-- Stepper — semua done --}}
        <div class="stepper">
            <div class="step done">
                <div class="step-circle">✓</div>
                <div class="step-label">Email</div>
            </div>
            <div class="step done">
                <div class="step-circle">✓</div>
                <div class="step-label">OTP</div>
            </div>
            <div class="step active">
                <div class="step-circle">3</div>
                <div class="step-label">Password Baru</div>
            </div>
        </div>

        @if($errors->any())
            <div class="alert-error">❌ {{ $errors->first() }}</div>
        @endif

        <p class="info-text">Silakan buat password baru yang kuat untuk akun Anda.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ $email }}" readonly>
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <div class="password-wrap">
                    <input type="password" id="password" name="password"
                           placeholder="Minimal 6 karakter" required autocomplete="new-password">
                    <button type="button" class="toggle-pw" onclick="togglePw('password', this)">👁</button>
                </div>
                <div class="strength-bar-wrap" id="strengthBars">
                    <span></span><span></span><span></span><span></span>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <div class="password-wrap">
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           placeholder="Ulangi password baru" required autocomplete="new-password">
                    <button type="button" class="toggle-pw" onclick="togglePw('password_confirmation', this)">👁</button>
                </div>
            </div>

            <button type="submit" class="btn">Simpan Password Baru →</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">← Kembali ke Login</a>
    </div>
</div>

<script>
function togglePw(id, btn) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        btn.textContent = '🙈';
    } else {
        input.type = 'password';
        btn.textContent = '👁';
    }
}

// Password strength indicator
document.getElementById('password').addEventListener('input', function() {
    const pw = this.value;
    const bars = document.querySelectorAll('#strengthBars span');
    let strength = 0;
    if (pw.length >= 6)  strength++;
    if (pw.length >= 10) strength++;
    if (/[A-Z]/.test(pw) && /[0-9]/.test(pw)) strength++;
    if (/[^A-Za-z0-9]/.test(pw)) strength++;

    const colors = ['#ef4444','#f97316','#eab308','#22c55e'];
    bars.forEach((bar, i) => {
        bar.style.background = i < strength ? colors[strength - 1] : '#e2e8f0';
    });
});
</script>
</body>
</html>