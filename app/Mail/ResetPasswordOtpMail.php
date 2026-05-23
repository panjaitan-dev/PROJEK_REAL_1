<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;
    public string $email;

    public function __construct(string $otp, string $email)
    {
        $this->otp   = $otp;
        $this->email = $email;
    }

    public function build(): static
    {
        return $this->subject('🔐 Kode OTP Reset Password - GeoToba')
                    ->view('emails.reset-password-otp');
    }
}
