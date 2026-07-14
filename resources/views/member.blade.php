<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Member - JKOP.ID</title>
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
            background-color: #f8fafc;
            color: #1e293b;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Component */
        .sidebar {
            width: 260px;
            background-color: #1e2e4a;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 28px;
            height: 28px;
        }

        .brand-text h1 {
            font-size: 16px;
            font-weight: 700;
            letter-spacing: -0.3px;
        }

        .brand-text span {
            color: #ef4444;
        }

        .brand-text p {
            font-size: 10px;
            color: #94a3b8;
            margin-top: 2px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0 12px;
            flex-grow: 1;
            margin-top: 20px;
        }

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            gap: 12px;
        }

        .menu-link svg {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .menu-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
        }

        .menu-item.active .menu-link {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
            font-weight: 600;
        }

        .sidebar-user {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            background-color: #18253c;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background-color: #ef4444;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
        }

        .user-info h4 {
            font-size: 12px;
            font-weight: 600;
            color: #ffffff;
        }

        .user-info p {
            font-size: 10px;
            color: #64748b;
            margin-top: 2px;
        }

        /* Workspace Grid Container */
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 32px 40px;
            min-width: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 32px;
        }

        .header-title h2 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
        }

        .header-title p {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn-notification {
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-notification svg {
            width: 20px;
            height: 20px;
        }

        .btn-notification::after {
            content: '';
            position: absolute;
            top: 2px;
            right: 2px;
            width: 5px;
            height: 5px;
            background-color: #ef4444;
            border-radius: 50%;
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid #e2e8f0;
            background-color: #ffffff;
            color: #64748b;
            font-size: 12px;
            font-weight: 500;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background-color: #f8fafc;
            color: #0f172a;
            border-color: #cbd5e1;
        }

        .btn-logout svg {
            width: 14px;
            height: 14px;
        }

        /* Dynamic Section Content */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Profile Highlight Banner */
        .profile-banner {
            background-color: #1e2e4a;
            border-radius: 12px;
            padding: 24px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 32px;
        }

        .banner-avatar {
            width: 56px;
            height: 56px;
            background-color: #ef4444;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 700;
        }

        .banner-meta h3 {
            font-size: 16px;
            font-weight: 700;
        }

        .banner-meta p {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .banner-badge {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            font-size: 10px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 6px;
            margin-top: 8px;
            color: #cbd5e1;
        }

        /* Balanced Grid Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            border: 1px solid #f1f5f9;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
        }

        .stat-card.rose::before { background-color: #f43f5e; }
        .stat-card.amber::before { background-color: #f59e0b; }
        .stat-card.emerald::before { background-color: #10b981; }
        .stat-card.sky::before { background-color: #0ea5e9; }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card.rose .stat-icon { background-color: #fff1f2; color: #f43f5e; }
        .stat-card.amber .stat-icon { background-color: #fffbeb; color: #f59e0b; }
        .stat-card.emerald .stat-icon { background-color: #ecfdf5; color: #10b981; }
        .stat-card.sky .stat-icon { background-color: #f0f9ff; color: #0ea5e9; }

        .stat-icon svg { width: 18px; height: 18px; }

        .stat-info p {
            font-size: 11px;
            color: #64748b;
            font-weight: 500;
        }

        .stat-info h3 {
            font-size: 20px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 4px;
        }

        /* Modern Box Layout Panel */
        .panel {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.01);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .panel-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .panel-title svg {
            width: 16px;
            height: 16px;
            color: #f43f5e;
        }

        /* Loan Summary Display View */
        .loan-body {
            padding: 30px 24px;
        }

        .loan-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr;
            row-gap: 24px;
            column-gap: 40px;
            margin-bottom: 32px;
        }

        .metric-item p {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .metric-item h4 {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
            margin-top: 6px;
        }

        .progress-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .progress-label { color: #94a3b8; }
        .progress-value { color: #ef4444; }

        .progress-track {
            width: 100%;
            height: 8px;
            background-color: #f1f5f9;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            background-color: #ef4444;
            border-radius: 10px;
            width: 66%;
        }

        /* Split-Column Interface Layout */
        .split-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 24px;
        }

        .panel-form {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #475569;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 13px;
            color: #334155;
            outline: none;
            background-color: #ffffff;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .btn-submit {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: #ef4444;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-submit:hover { background-color: #dc2626; }
        .btn-submit svg { width: 14px; height: 14px; }

        /* Tables */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13px;
        }

        .table th {
            background-color: #f8fafc;
            padding: 14px 24px;
            color: #94a3b8;
            font-weight: 600;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table td {
            padding: 16px 24px;
            color: #475569;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .text-green { color: #10b981 !important; font-weight: 600; }

        /* Status Pills */
        .status-pill {
            display: inline-flex;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-pill.success { background-color: #ecfdf5; color: #10b981; }
        .status-pill.info { background-color: #f0f9ff; color: #0ea5e9; }

        /* Internal Tab Headers */
        .sub-nav {
            display: flex;
            gap: 24px;
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .sub-nav-item {
            font-size: 12px;
            color: #64748b;
            text-decoration: none;
            cursor: pointer;
            font-weight: 500;
        }
        .sub-nav-item.active { color: #0f172a; font-weight: 600; }

    </style>
</head>
<body>

    <!-- Sidebar Layout Navigation -->
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img class="brand-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="width: 28px; height: 28px;">
                <div class="brand-text">
                    <h1>JKOP<span>.ID</span></h1>
                    <p>Panel Anggota</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-item active" onclick="switchTab('dashboard', this, 'Dashboard Member', 'Selamat datang di panel anggota')">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('simpanan', this, 'Simpanan', 'Kelola dan lihat riwayat simpanan Anda')">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2zM5 15h14v-2H5v2zm0 2h14v-2H5v2zm14-8H5v2h14V9zm0-4H5v2h14V5zM5 3h14v2H5V3z"/></svg>
                        <span>Simpanan</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('loan', this, 'Pengajuan Pinjaman', 'Formulir pengajuan dan status pinjaman Anda')">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                        <span>Pengajuan Pinjaman</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('history', this, 'Riwayat Angsuran', 'Data pembayaran angsuran bulanan Anda')">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                        <span>Riwayat Angsuran</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(substr($member->nama, 0, 2)) }}</div>
            <div class="user-info">
                <h4>{{ $member->nama }}</h4>
                <p>Member</p>
            </div>
        </div>
    </aside>

    <!-- Content Area Container Workspace -->
    <main class="main-content">
        
        <header class="header">
            <div class="header-title">
                <h2 id="dynamic-title">Dashboard Member</h2>
                <p id="dynamic-subtitle">Selamat datang di panel anggota</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('logout') }}" class="btn-logout" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar</a>
            </div>
        </header>

        <!-- TAB 1: CORE DASHBOARD VIEW -->
        <div id="tab-dashboard" class="tab-content active">
            <div class="profile-banner">
                <div class="banner-avatar">{{ strtoupper(substr($member->nama, 0, 2)) }}</div>
                <div class="banner-meta">
                    <h3>{{ $member->nama }}</h3>
                    <p>{{ $member->no_telepon }}</p>
                    <div class="banner-badge">ID: {{ $member->id_member }}</div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card rose">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Simpanan Pokok</p>
                        <h3>Rp {{ number_format($simpananPokok, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card amber">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5a2 2 0 10-2 2h2zm0 13a4 4 0 100-8 4 4 0 000 8z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Simpanan Wajib</p>
                        <h3>Rp {{ number_format($simpananWajib, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card emerald">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Simpanan Sukarela</p>
                        <h3>Rp {{ number_format($simpananSukarela, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card sky">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Simpanan</p>
                        <h3>Rp {{ number_format($totalSimpanan, 0, ",", ".") }}</h3>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011-1v5m-4 0h4"></path></svg>
                        Pinjaman Aktif
                    </div>
                </div>
                @if($activeLoan)
                <div class="loan-body">
                    <div class="loan-metrics">
                        <div class="metric-item">
                            <p>Jumlah Pinjaman Awal</p>
                            <h4>Rp {{ number_format($activeLoan->nominal, 0, ",", ".") }}</h4>
                        </div>
                        <div class="metric-item">
                            <p>Tenor</p>
                            <h4>{{ $activeLoan->tenor }} Bulan</h4>
                        </div>
                        <div class="metric-item">
                            <p>Sisa Angsuran</p>
                            <h4>{{ $activeLoan->tenor - $paidMonths }} Bulan</h4>
                        </div>
                        <div class="metric-item">
                            <p>Angsuran / Bulan</p>
                            <h4>Rp {{ number_format(($activeLoan->nominal / $activeLoan->tenor) + ($activeLoan->nominal * ($activeLoan->bunga / 100)), 0, ",", ".") }}</h4>
                        </div>
                        <div class="metric-item">
                            <p>Total Sudah Dibayar</p>
                            <h4 style="color: #10b981;">Rp {{ number_format($totalPaid, 0, ",", ".") }}</h4>
                        </div>
                        <div class="metric-item">
                            <p>Sisa Pinjaman</p>
                            <h4 style="color: #ef4444;">Rp {{ number_format($sisaPinjaman, 0, ",", ".") }}</h4>
                        </div>
                    </div>
                    <div class="progress-container">
                        <div class="progress-meta">
                            <span class="progress-label">Progress Pelunasan ({{ number_format(($paidMonths / $activeLoan->tenor) * 100, 0) }}%)</span>
                            <span class="progress-value">{{ $paidMonths }}/{{ $activeLoan->tenor }} Bln</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-bar" style="width: {{ ($paidMonths / $activeLoan->tenor) * 100 }}%; height: 100%; background-color: #ef4444;"></div>
                        </div>
                    </div>
                </div>
                @else
                <div style="padding: 40px 24px; color: #94a3b8; font-size: 13px; text-align: center;">
                    Tidak ada pinjaman aktif saat ini.
                </div>
                @endif
            </div>
        </div>

        <!-- TAB 2: DETAILED RECORD SAVINGS VIEW -->
        <div id="tab-simpanan" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Riwayat Simpanan
                    </div>
                </div>
                <div class="sub-nav">
                    <span class="sub-nav-item active">Pokok & Wajib</span>
                    <span class="sub-nav-item">Sukarela</span>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis Simpanan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($simpanan as $simp)
                            <tr>
                                <td>{{ date('d M Y', strtotime($simp->tgl_simpan)) }}</td>
                                <td>Simpanan {{ ucfirst($simp->jenis_simp) }}</td>
                                <td class="text-green">+ Rp {{ number_format($simp->nominal, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: #94a3b8; padding: 40px 24px;">Belum terdapat data transaksi simpanan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 3: SPLIT GRID LOAN APPLICATION INTERFACE -->
        <div id="tab-loan" class="tab-content">
            <div class="split-grid">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Form Pengajuan
                        </div>
                    </div>
                    <form action="{{ route('member.pinjaman.store') }}" method="POST" class="panel-form">
                        @csrf
                        <div class="form-group">
                            <label>Jumlah Pinjaman (Rp)</label>
                            <input type="number" name="nominal" class="form-control" placeholder="Contoh: 5000000" required>
                        </div>
                        <div class="form-group">
                            <label>Tenor (Bulan)</label>
                            <select name="tenor" class="form-control" required>
                                <option value="6">6 Bulan</option>
                                <option value="12">12 Bulan</option>
                                <option value="24">24 Bulan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tujuan Pinjaman</label>
                            <input type="text" class="form-control" placeholder="Contoh: Modal Usaha" required>
                        </div>
                        <div class="form-group">
                            <label>Jaminan</label>
                            <input type="text" class="form-control" placeholder="Contoh: BPKB Motor" required>
                        </div>
                        <button type="submit" class="btn-submit">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Ajukan Pinjaman
                        </button>
                    </form>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Status Pengajuan
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($loans as $ln)
                                <tr>
                                    <td>{{ date('d M Y', strtotime($ln->tgl_ajuan)) }}</td>
                                    <td><b>Rp {{ number_format($ln->nominal, 0, ',', '.') }}</b></td>
                                    <td>
                                        @if($ln->status === 'approved')
                                            <span class="status-pill success">✓ Disetujui</span>
                                        @elseif($ln->status === 'rejected')
                                            <span class="status-pill" style="background-color: #fef2f2; color: #ef4444;">✗ Ditolak</span>
                                        @elseif($ln->status === 'pending_ketua')
                                            <span class="status-pill info">○ Proses Ketua</span>
                                        @else
                                            <span class="status-pill info">○ Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" style="text-align: center; color: #94a3b8; padding: 40px 24px;">Belum terdapat pengajuan pinjaman.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB 4: AMORTIZATION/INSTALLMENTS TIMELINE HISTORIC VIEW -->
        <div id="tab-history" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Riwayat Pembayaran Angsuran
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Bulan Ke</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($angsuran as $ang)
                            <tr>
                                <td>Ke-{{ $ang->ke_angsuran }}</td>
                                <td>{{ date('d M Y', strtotime($ang->tgl_bayar)) }}</td>
                                <td class="text-green">+ Rp {{ number_format($ang->nominal, 0, ',', '.') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: #94a3b8; padding: 40px 24px;">Belum terdapat data pembayaran angsuran.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <!-- SPA Logic Segment Router Matrix -->
    <script>
        function switchTab(tabId, element, titleText, subtitleText) {
            // Remove state configuration flags from alternative items
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Append current context node as the focus identifier
            element.classList.add('active');

            // Hide cross-sectional tab modules layout layers
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Target routing activation layer
            document.getElementById('tab-' + tabId).classList.add('active');

            // Set contextual structural headers dynamically
            document.getElementById('dynamic-title').innerText = titleText;
            document.getElementById('dynamic-subtitle').innerText = subtitleText;
        }
    </script>
</body>
</html>