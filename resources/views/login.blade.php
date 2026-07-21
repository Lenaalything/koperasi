<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JKOP.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>

    <div class="login-container">
        <div class="logo-wrapper">
            <img class="logo-icon" src="{{ asset('assets/img/logo.png') }}" alt="Logo JKOP">
            <div class="logo-text">JKOP<span>.ID</span></div>
            <div class="subtitle">Sistem Manajemen Koperasi Terpadu</div>
        </div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            @if($errors->any())
                <div class="error-msg">{{ $errors->first() }}</div>
            @endif
            @if(session('error'))
                <div class="error-msg">{{ session('error') }}</div>
            @endif
            <div class="form-group">
                <input type="text" name="username" class="input-field" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="input-field" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-submit">MASUK</button>
            
            <div class="login-footer">
                Belum memiliki akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
        </form>
    </div>

</body>
</html>