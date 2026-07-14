<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - JKOP.ID</title>
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
            padding: 40px 20px;
        }

        .register-container {
            width: 100%;
            max-width: 480px;
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
            object-fit: contain;
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
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            color: #334155;
            background-color: #ffffff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .input-field:focus {
            border-color: #ef4444;
        }

        .input-field::placeholder {
            color: #cbd5e1;
        }

        .textarea-field {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            color: #334155;
            background-color: #ffffff;
            outline: none;
            resize: vertical;
            min-height: 80px;
        }

        .textarea-field:focus {
            border-color: #ef4444;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #ef4444;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25);
        }

        .btn-submit:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <div class="logo-wrapper">
            <img class="logo-icon" src="{{ asset('assets/img/logo.png') }}" alt="Logo JKOP" style="width: 32px; height: 32px;">
            <div class="logo-text">JKOP<span>.ID</span></div>
            <div class="subtitle">Pendaftaran Anggota Koperasi Baru</div>
        </div>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            @if($errors->any())
                <div style="color: #ef4444; font-size: 12px; margin-bottom: 12px; text-align: center;">{{ $errors->first() }}</div>
            @endif

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="input-field" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email" name="email" class="input-field" placeholder="contoh@domain.com" required>
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telepon" class="input-field" placeholder="08xxxxxxxx" required>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="textarea-field" placeholder="Masukkan alamat tempat tinggal" required></textarea>
            </div>

            <div style="border-top: 1px dashed #e2e8f0; margin: 20px 0; padding-top: 15px;"></div>

            <div class="form-group">
                <label>Username (Untuk Login)</label>
                <input type="text" name="username" class="input-field" placeholder="Pilih username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="input-field" placeholder="Buat password minimal 6 karakter" required>
            </div>

            <button type="submit" class="btn-submit">DAFTAR ANGGOTA</button>
            
            <div style="margin-top: 20px; font-size: 13px; color: #64748b;">
                Sudah memiliki akun? <a href="{{ route('login') }}" style="color: #ef4444; font-weight: 600; text-decoration: none;">Masuk Di Sini</a>
            </div>
        </form>
    </div>

</body>
</html>
