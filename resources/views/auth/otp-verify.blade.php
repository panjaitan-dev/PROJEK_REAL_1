<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - GeoToba</title>
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
            background: #e2e8f0;
            z-index: 0;
        }
        .step.done:not(:last-child)::after  { background: #c6a43b; }
        .step-circle {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem; font-weight: 700;
            position: relative; z-index: 1;
        }
        .step.done   .step-circle { background: #c6a43b; color: #fff; }
        .step.active .step-circle { background: #c6a43b; color: #fff; box-shadow: 0 4px 14px rgba(198,164,59,0.4); }
        .step.inactive .step-circle { background: #e2e8f0; color: #94a3b8; }
        .step-label { font-size: 0.68rem; margin-top: 6px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em; }
        .step.done   .step-label { color: #c6a43b; }
        .step.active .step-label { color: #c6a43b; }
        .step.inactive .step-label { color: #94a3b8; }

        /* Info */
        .info-text {
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.65;
            margin-bottom: 22px;
            text-align: center;
        }
        .info-text strong { color: #1e293b; }

        /* OTP inputs */
        .otp-input-wrap {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 8px;
        }
        .otp-digit {
            width: 52px;
            height: 60px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            background: #f8fafc;
            color: #1e293b;
            font-size: 1.6rem;
            font-weight: 700;
            text-align: center;
            transition: all 0.2s;
        }
        .otp-digit:focus {
            outline: none;
            border-color: #c6a43b;
            background: #fffdf0;
            box-shadow: 0 0 0 3px rgba(198,164,59,0.2);
        }

        .timer {
            text-align: center;
            color: #94a3b8;
            font-size: 0.78rem;
            margin: 12px 0 22px;
        }
        .timer #countdown { color: #c6a43b; font-weight: 700; }

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

        .alert-success {
            background: #f0fdf4; border: 1px solid #86efac; color: #15803d;
            padding: 11px 14px; border-radius: 10px; font-size: 0.83rem; margin-bottom: 18px;
        }
        .alert-error {
            background: #fef2f2; border: 1px solid #fca5a5; color: #b91c1c;
            padding: 11px 14px; border-radius: 10px; font-size: 0.83rem; margin-bottom: 18px;
        }

        input[type="hidden"] { display: none; }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="card-header">
        <span class="icon">🔑</span>
        <h2>Lupa Password</h2>
        <p>Kami kirimkan kode OTP ke email Anda</p>
    </div>

    <div class="card-body">

        {{-- Stepper --}}
        <div class="stepper">
            <div class="step done">
                <div class="step-circle">✓</div>
                <div class="step-label">Email</div>
            </div>
            <div class="step active">
                <div class="step-circle">2</div>
                <div class="step-label">OTP</div>
            </div>
            <div class="step inactive">
                <div class="step-circle">3</div>
                <div class="step-label">Password Baru</div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">❌ {{ $errors->first() }}</div>
        @endif

        <p class="info-text">
            Masukkan <strong>kode OTP 6 digit</strong> yang telah dikirim ke<br>
            <strong>{{ $email }}</strong>
        </p>

        <form action="{{ route('password.otp.verify') }}" method="POST" id="otpForm">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="otp"   id="otpHidden">

            <div class="otp-input-wrap">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
                <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="off">
            </div>

            <div class="timer">Kode berlaku: <span id="countdown">10:00</span></div>

            <button type="submit" class="btn">Verifikasi OTP →</button>
        </form>

        <a href="{{ route('password.request') }}" class="back-link">← Kirim ulang OTP</a>
    </div>
</div>

<script>
// Auto-focus & auto-advance
const digits = document.querySelectorAll('.otp-digit');
digits[0].focus();

digits.forEach((el, idx) => {
    el.addEventListener('input', () => {
        el.value = el.value.replace(/\D/g, '').slice(-1);
        if (el.value && idx < digits.length - 1) digits[idx + 1].focus();
        updateHidden();
    });
    el.addEventListener('keydown', e => {
        if (e.key === 'Backspace' && !el.value && idx > 0) {
            digits[idx - 1].focus();
            digits[idx - 1].value = '';
            updateHidden();
        }
    });
    // Handle paste
    el.addEventListener('paste', e => {
        e.preventDefault();
        const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g,'');
        pasted.split('').slice(0, 6).forEach((ch, i) => {
            if (digits[i]) digits[i].value = ch;
        });
        updateHidden();
        const next = Math.min(pasted.length, 5);
        digits[next].focus();
    });
});

function updateHidden() {
    document.getElementById('otpHidden').value = Array.from(digits).map(d => d.value).join('');
}

document.getElementById('otpForm').addEventListener('submit', function(e) {
    updateHidden();
    if (document.getElementById('otpHidden').value.length < 6) {
        e.preventDefault();
        alert('Masukkan 6 digit OTP terlebih dahulu.');
    }
});

// Countdown 10 menit
let seconds = 600;
const countEl = document.getElementById('countdown');
const timer = setInterval(() => {
    seconds--;
    if (seconds <= 0) {
        clearInterval(timer);
        countEl.textContent = 'Kadaluarsa';
        countEl.style.color = '#ef4444';
    } else {
        const m = Math.floor(seconds / 60).toString().padStart(2,'0');
        const s = (seconds % 60).toString().padStart(2,'0');
        countEl.textContent = m + ':' + s;
    }
}, 1000);
</script>
</body>
</html>
