<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - JKOP.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>
<body>

    <div class="register-container">
        <div class="logo-wrapper">
            <img class="logo-icon" src="{{ asset('assets/img/logo.png') }}" alt="Logo JKOP">
            <div class="logo-text">JKOP<span>.ID</span></div>
            <div class="subtitle">Pendaftaran Anggota Koperasi Baru</div>
        </div>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            @if($errors->any())
                <div class="error-msg">{{ $errors->first() }}</div>
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
                <input type="text" name="no_telepon" class="input-field" placeholder="08xxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
            </div>

            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="textarea-field" placeholder="Masukkan alamat tempat tinggal" required></textarea>
            </div>

            <div class="form-divider"></div>

            <div class="form-group">
                <label>Username (Untuk Login)</label>
                <input type="text" name="username" class="input-field" placeholder="Pilih username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="input-field" placeholder="Buat password minimal 6 karakter" required>
            </div>

            <button type="submit" class="btn-submit">DAFTAR ANGGOTA</button>
            
            <div class="register-footer">
                Sudah memiliki akun? <a href="{{ route('login') }}">Masuk Di Sini</a>
            </div>
        </form>
    </div>

</body>
</html>
