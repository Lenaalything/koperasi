<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JKOP.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at 10% 20%, rgba(255, 230, 235, 0.4) 0%, rgba(255, 255, 255, 1) 50%, rgba(230, 242, 255, 0.4) 100%);
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04), 0 1px 8px rgba(0, 0, 0, 0.02);
            text-align: center;
        }

        .logo-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 24px;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            margin-bottom: 12px;
        }

        .logo-text {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .logo-text span {
            color: #ef4444;
        }

        .subtitle {
            font-size: 11px;
            color: #94a3b8;
            margin-top: 4px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .input-field {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            color: #334155;
            background-color: #ffffff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-field:focus {
            border-color: #cbd5e1;
        }

        .input-field::placeholder {
            color: #cbd5e1;
        }

        .role-title {
            font-size: 11px;
            font-weight: 600;
            color: #475569;
            margin: 24px 0 16px 0;
        }

        .role-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .role-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
            cursor: pointer;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .role-card:hover {
            border-color: #cbd5e1;
            background-color: #f8fafc;
        }

        .role-card svg {
            width: 20px;
            height: 20px;
            color: #64748b;
        }

        .role-card span {
            font-size: 12px;
            font-weight: 600;
            color: #334155;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="logo-wrapper">
            <img class="logo-icon" src="{{ asset('assets/img/logo.png') }}" alt="Logo JKOP" style="width: 32px; height: 32px; object-fit: contain; margin-bottom: 12px;">
            <div class="logo-text">JKOP<span>.ID</span></div>
            <div class="subtitle">Sistem Manajemen Koperasi Terpadu</div>
        </div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            @if($errors->any())
                <div style="color: #ef4444; font-size: 12px; margin-bottom: 12px;">{{ $errors->first() }}</div>
            @endif
            <div class="form-group">
                <input type="text" name="username" class="input-field" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="input-field" placeholder="Password" required>
            </div>

            <button type="submit" style="width: 100%; padding: 14px; background-color: #ef4444; border: none; border-radius: 8px; color: white; font-weight: 600; font-size: 14px; cursor: pointer; margin-top: 10px; transition: background 0.2s; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);">MASUK</button>
            
            <div style="margin-top: 20px; font-size: 13px; color: #64748b;">
                Belum memiliki akun? <a href="{{ route('register') }}" style="color: #ef4444; font-weight: 600; text-decoration: none;">Daftar Sekarang</a>
            </div>
        </form>
    </div>

</body>
</html>