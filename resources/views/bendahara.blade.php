<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bendahara - JKOP.ID</title>
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

        /* Sidebar Styles */
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

        .menu-header {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            padding: 16px 16px 8px 16px;
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
            background-color: #10b981;
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

        /* Main Content Layout */
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

        /* Tabs Visibility */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Top Bar Indicators Card */
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

        .stat-card.emerald::before { background-color: #10b981; }
        .stat-card.rose::before { background-color: #f43f5e; }
        .stat-card.sky::before { background-color: #0ea5e9; }
        .stat-card.amber::before { background-color: #f59e0b; }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card.emerald .stat-icon { background-color: #ecfdf5; color: #10b981; }
        .stat-card.rose .stat-icon { background-color: #fff1f2; color: #f43f5e; }
        .stat-card.sky .stat-icon { background-color: #f0f9ff; color: #0ea5e9; }
        .stat-card.amber .stat-icon { background-color: #fffbeb; color: #f59e0b; }

        .stat-icon svg { width: 20px; height: 20px; }

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

        /* Two Columns Layout Dashboard */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        /* Container & Panels */
        .panel {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.01);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .panel-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        /* CSS Murni Chart Placeholder */
        .chart-placeholder {
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            height: 280px;
            position: relative;
        }

        .chart-axis-x {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
            margin-top: 20px;
        }

        .chart-axis-x span {
            font-size: 11px;
            color: #94a3b8;
            width: 16.66%;
            text-align: center;
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #475569;
            font-weight: 500;
        }

        .legend-color {
            width: 100%;
            max-width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .legend-color.green { background-color: #10b981; }
        .legend-color.red { background-color: #ef4444; }

        /* Forms Layout & Inputs */
        .panel-body-form {
            padding: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
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

        .form-control:focus {
            border-color: #cbd5e1;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
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

        .btn-primary {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #ef4444;
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        /* Modern Micro Tables */
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
        }

        .table tr.table-summary-row td {
            background-color: #f8fafc;
            font-weight: 700;
            border-top: 1px solid #e2e8f0;
        }

        .text-right { text-align: right; }
        .text-green { color: #10b981 !important; }
        .text-red { color: #ef4444 !important; }

        /* Badges & Micro Interactions */
        .badge-status {
            display: inline-flex;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-status.success { background-color: #ecfdf5; color: #10b981; }
        .badge-status.warning { background-color: #fff7ed; color: #f97316; }

        .icon-btn-edit {
            background: none;
            border: none;
            cursor: pointer;
            color: #ef4444;
            display: inline-flex;
        }

        .icon-btn-edit svg { width: 16px; height: 16px; }

    </style>
</head>
<body>

    <!-- Sidebar Component -->
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img class="brand-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="width: 28px; height: 28px;">
                <div class="brand-text">
                    <h1>JKOP<span>.ID</span></h1>
                    <p>Panel Bendahara</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-item active" onclick="switchTab('dashboard', this)">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <div class="menu-header">Transaksi</div>
                
                <li class="menu-item" onclick="switchTab('simpanan', this)">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M19 13H5v-2h14v2zM5 15h14v-2H5v2zm0 2h14v-2H5v2zm14-8H5v2h14V9zm0-4H5v2h14V5zM5 3h14v2H5V3z"/></svg>
                        <span>Simpanan</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('angsuran', this)">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                        <span>Angsuran</span>
                    </a>
                </li>

                <div class="menu-header">Keuangan</div>

                <li class="menu-item" onclick="switchTab('pembukuan', this)">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                        <span>Jurnal Pembukuan</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('aset', this)">
                    <a class="menu-link">
                        <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        <span>Manajemen Aset</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(substr(session('user.nama', 'Wahyu Ningsih'), 0, 2)) }}</div>
            <div class="user-info">
                <h4>{{ session('user.nama', 'Wahyu Ningsih') }}</h4>
                <p>Bendahara</p>
            </div>
        </div>
    </aside>

    <!-- Content Workspace -->
    <main class="main-content">
        
        <!-- Navbar Header dynamic context update text built into switchTab -->
        <header class="header">
            <div class="header-title">
                <h2 id="dynamic-title">Dashboard Bendahara</h2>
                <p id="dynamic-subtitle">Manajemen kas, transaksi, dan pembukuan</p>
            </div>
            <a href="{{ route('logout') }}" class="btn-logout" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar</a>
        </header>

        <!-- TAB 1: DASHBOARD VIEW -->
        <div id="tab-dashboard" class="tab-content active">
            <div class="stats-grid">
                <div class="stat-card emerald">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Kas Masuk (Bulan Ini)</p>
                        <h3>Rp {{ number_format($debit, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card rose">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Kas Keluar (Bulan Ini)</p>
                        <h3>Rp {{ number_format($kredit, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card sky">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Saldo Kas Aktif</p>
                        <h3>Rp {{ number_format($saldo, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card amber">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Nilai Aset</p>
                        <h3>Rp {{ number_format($totalAset, 0, ",", ".") }}</h3>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                            Arus Kas
                        </div>
                    </div>
                    <div class="chart-placeholder">
                        <div class="chart-axis-x">
                            <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span>
                        </div>
                        <div class="chart-legend">
                            <div class="legend-item"><div class="legend-color green"></div> Masuk</div>
                            <div class="legend-item"><div class="legend-color red"></div> Keluar</div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            Jurnal Terakhir
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Keterangan</th>
                                <th class="text-right">Debit</th>
                                <th class="text-right">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jurnal->take(5) as $jur)
                            <tr>
                                <td>{{ $jur->deskripsi }}</td>
                                <td class="text-right text-green">{{ $jur->debit > 0 ? 'Rp ' . number_format($jur->debit, 0, ',', '.') : '-' }}</td>
                                <td class="text-right text-red">{{ $jur->kredit > 0 ? 'Rp ' . number_format($jur->kredit, 0, ',', '.') : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada riwayat pembukuan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 2: INPUT SIMPANAN -->
        <div id="tab-simpanan" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M8 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2h-4"></path></svg>
                        Input Simpanan Member
                    </div>
                </div>
                <form action="{{ route('bendahara.simpanan.store') }}" method="POST" class="panel-body-form">
                    @csrf
                    <div class="form-group">
                        <label>Pilih Member</label>
                        <select name="id_member" class="form-control" style="background: white; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px; width: 100%;" required>
                            @foreach($member as $m)
                            <option value="{{ $m->id_member }}">{{ $m->id_member }} - {{ $m->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Jenis Simpanan</label>
                            <select name="jenis_simp" class="form-control" style="background: white; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px; width: 100%;" required>
                                <option value="pokok">Pokok</option>
                                <option value="wajib">Wajib</option>
                                <option value="sukarela">Sukarela</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nominal (Rp)</label>
                            <input type="number" name="nominal" class="form-control" value="100000" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tgl_simpan" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20"></path></svg>
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>

        <!-- TAB 3: INPUT ANGSURAN -->
        <div id="tab-angsuran" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Input Pembayaran Angsuran
                    </div>
                </div>
                <form action="{{ route('bendahara.angsuran.store') }}" method="POST" class="panel-body-form">
                    @csrf
                    <div class="form-group">
                        <label>Pilih Pinjaman Aktif</label>
                        <select name="id_pinjaman" class="form-control" style="background: white; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px; width: 100%;" required>
                            @forelse($loans as $l)
                            <option value="{{ $l->id_pinjaman }}">{{ $l->id_pinjaman }} - {{ $l->nama_member }} (Rp {{ number_format($l->nominal, 0, ',', '.') }})</option>
                            @empty
                            <option value="">Tidak ada pinjaman aktif</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nominal Angsuran (Rp)</label>
                            <input type="number" name="nominal" class="form-control" value="458333" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-submit">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20"></path></svg>
                        Simpan Transaksi
                    </button>
                </form>
            </div>
        </div>

        <!-- TAB 4: JURNAL PEMBUKUAN -->
        <div id="tab-pembukuan" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M8 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2h-4"></path></svg>
                        Jurnal Pembukuan
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th class="text-right">Debit</th>
                                <th class="text-right">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jurnal as $jur)
                            <tr>
                                <td>{{ date('d M Y', strtotime($jur->tgl_transaksi)) }}</td>
                                <td>{{ $jur->deskripsi }}</td>
                                <td class="text-right text-green">{{ $jur->debit > 0 ? 'Rp ' . number_format($jur->debit, 0, ',', '.') : '-' }}</td>
                                <td class="text-right text-red">{{ $jur->kredit > 0 ? 'Rp ' . number_format($jur->kredit, 0, ',', '.') : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada riwayat pembukuan.</td>
                            </tr>
                            @endforelse
                            <tr class="table-summary-row">
                                <td colspan="2" class="text-right">TOTAL</td>
                                <td class="text-right text-green">Rp {{ number_format($debit, 0, ',', '.') }}</td>
                                <td class="text-right text-red">Rp {{ number_format($kredit, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 5: MANAJEMEN ASET -->
        <div id="tab-aset" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Manajemen Aset
                    </div>
                    <button class="btn-primary" onclick="toggleAddAssetForm()">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Aset
                    </button>
                </div>

                <div id="add-asset-form-panel" style="display: none; margin-top: 20px; border-bottom: 1px dashed #e2e8f0; padding-bottom: 24px;">
                    <div style="background-color: #f8fafc; border-radius: 8px; padding: 20px; border: 1px solid #e2e8f0;">
                        <h4 id="asset-form-title" style="margin-bottom: 16px; color: #0f172a; font-weight: 700;">Tambah Aset Baru</h4>
                        <form action="{{ route('bendahara.aset.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_aset" id="form-id-aset">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Nama Aset</label>
                                    <input type="text" name="nama_aset" id="form-nama-aset" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" required>
                                </div>
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Kategori</label>
                                    <select name="kategori" id="form-kategori-aset" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; background: white;" required>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Furnitur">Furnitur</option>
                                        <option value="Kendaraan">Kendaraan</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Nilai Perolehan (Rp)</label>
                                    <input type="number" name="nilai_perolehan" id="form-nilai-aset" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" required>
                                </div>
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Tanggal Perolehan</label>
                                    <input type="date" name="tgl_perolehan" id="form-tgl-aset" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Kondisi</label>
                                <select name="kondisi" id="form-kondisi-aset" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; background: white;" required>
                                    <option value="baik">Baik</option>
                                    <option value="cukup">Cukup</option>
                                    <option value="rusak">Rusak</option>
                                </select>
                            </div>
                            <div style="display: flex; gap: 12px;">
                                <button type="submit" class="btn-table-action success">Simpan</button>
                                <button type="button" class="btn-table-action secondary" onclick="toggleAddAssetForm()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Nilai (Rp)</th>
                                <th>Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aset as $as)
                            <tr>
                                <td><b>{{ $as->id_aset }}</b></td>
                                <td><b>{{ $as->nama_aset }}</b></td>
                                <td>{{ $as->kategori }}</td>
                                <td><b>Rp {{ number_format($as->nilai_perolehan, 0, ',', '.') }}</b></td>
                                <td>
                                    <span class="badge-status {{ $as->kondisi === 'baik' ? 'success' : 'warning' }}">
                                        {{ ucfirst($as->kondisi) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="icon-btn-edit" onclick="editAsset('{{ $as->id_aset }}', '{{ $as->nama_aset }}', '{{ $as->nilai_perolehan }}', '{{ $as->kategori }}', '{{ $as->tgl_perolehan }}', '{{ $as->kondisi }}')">
                                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada aset terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <!-- SPA Tab System Switcher Logical Engine -->
    <script>
        function switchTab(tabId, element) {
            // Remove active style state from previous navigation elements
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Map the active class identifier to current targeting item
            element.classList.add('active');

            // Toggle visibility for all underlying container segments
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Bring selected segment into front focus view
            document.getElementById('tab-' + tabId).classList.add('active');

            // Dynamically alter dashboard layout metadata descriptions safely
            const dynamicTitle = document.getElementById('dynamic-title');
            const dynamicSubtitle = document.getElementById('dynamic-subtitle');

            if(tabId === 'dashboard') {
                dynamicTitle.innerText = "Dashboard Bendahara";
                dynamicSubtitle.innerText = "Manajemen kas, transaksi, dan pembukuan";
            } else if(tabId === 'simpanan') {
                dynamicTitle.innerText = "Dashboard Bendahara";
                dynamicSubtitle.innerText = "Manajemen kas, transaksi, dan pembukuan";
            } else if(tabId === 'angsuran') {
                dynamicTitle.innerText = "Dashboard Bendahara";
                dynamicSubtitle.innerText = "Manajemen kas, transaksi, dan pembukuan";
            } else if(tabId === 'pembukuan') {
                dynamicTitle.innerText = "Dashboard Bendahara";
                dynamicSubtitle.innerText = "Manajemen kas, transaksi, dan pembukuan";
            } else if(tabId === 'aset') {
                dynamicTitle.innerText = "Dashboard Bendahara";
                dynamicSubtitle.innerText = "Manajemen kas, transaksi, dan pembukuan";
            }
        }

        function toggleAddAssetForm() {
            var panel = document.getElementById('add-asset-form-panel');
            if (panel.style.display === 'none') {
                panel.style.display = 'block';
                document.getElementById('asset-form-title').innerText = 'Tambah Aset Baru';
                document.getElementById('form-id-aset').value = '';
                document.getElementById('form-nama-aset').value = '';
                document.getElementById('form-nilai-aset').value = '';
                document.getElementById('form-kategori-aset').value = 'Elektronik';
                document.getElementById('form-kondisi-aset').value = 'baik';
            } else {
                panel.style.display = 'none';
            }
        }

        function editAsset(id, nama, nilai, kategori, tanggal, kondisi) {
            var panel = document.getElementById('add-asset-form-panel');
            panel.style.display = 'block';
            document.getElementById('asset-form-title').innerText = 'Edit Aset: ' + id;
            document.getElementById('form-id-aset').value = id;
            document.getElementById('form-nama-aset').value = nama;
            document.getElementById('form-nilai-aset').value = nilai;
            document.getElementById('form-kategori-aset').value = kategori;
            document.getElementById('form-tgl-aset').value = tanggal;
            document.getElementById('form-kondisi-aset').value = kondisi;
        }
    </script>
</body>
</html>