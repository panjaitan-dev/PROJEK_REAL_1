<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - GeoToba</title>
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

        /* ── Wrapper card ── */
        .wrapper {
            width: 100%;
            max-width: 420px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0,0,0,0.5);
        }

        /* ── Dark header ── */
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

        /* ── White body ── */
        .card-body {
            background: #ffffff;
            padding: 30px 36px 32px;
        }

        /* ── Stepper ── */
        .stepper {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 0;
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
        .step.active:not(:last-child)::after { background: #e2e8f0; }
        .step-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            font-weight: 700;
            position: relative;
            z-index: 1;
            transition: all 0.3s;
        }
        .step.active .step-circle {
            background: #c6a43b;
            color: #fff;
            box-shadow: 0 4px 14px rgba(198,164,59,0.4);
        }
        .step.done .step-circle {
            background: #c6a43b;
            color: #fff;
        }
        .step.inactive .step-circle {
            background: #e2e8f0;
            color: #94a3b8;
        }
        .step-label {
            font-size: 0.68rem;
            margin-top: 6px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .step.active .step-label { color: #c6a43b; }
        .step.done .step-label   { color: #c6a43b; }
        .step.inactive .step-label { color: #94a3b8; }

        /* ── Form ── */
        .info-text {
            font-size: 0.88rem;
            color: #475569;
            line-height: 1.65;
            margin-bottom: 22px;
        }
        .info-text strong { color: #1e293b; }

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
        .form-group input::placeholder { color: #b0bec5; }

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
            margin-top: 4px;
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

        /* Alerts */
        .alert-success {
            background: #f0fdf4;
            border: 1px solid #86efac;
            color: #15803d;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 0.83rem;
            margin-bottom: 18px;
        }
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 11px 14px;
            border-radius: 10px;
            font-size: 0.83rem;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    {{-- Dark header --}}
    <div class="card-header">
        <span class="icon">🔑</span>
        <h2>Lupa Password</h2>
        <p>Kami kirimkan kode OTP ke email Anda</p>
    </div>

    {{-- White body --}}
    <div class="card-body">

        {{-- Stepper --}}
        <div class="stepper">
            <div class="step active">
                <div class="step-circle">1</div>
                <div class="step-label">Email</div>
            </div>
            <div class="step inactive">
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
            Masukkan email yang terdaftar. Kami akan mengirimkan <strong>kode OTP 6 digit</strong>
            untuk verifikasi identitas Anda.
        </p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email"
                       placeholder="contoh@email.com"
                       value="{{ old('email') }}" required autofocus>
            </div>
            <button type="submit" class="btn">Kirim Kode OTP →</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">← Kembali ke Login</a>
    </div>
</div>

</body>
</html>