<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ketua - JKOP.ID</title>
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

        .menu-item {
            margin-bottom: 4px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .menu-link div {
            display: flex;
            align-items: center;
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

        .sidebar-badge {
            background-color: #ef4444;
            color: white;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 10px;
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

        /* Main Workspace Styles */
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

        /* Tab Displays */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Indicator Cards */
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

        .stat-card.blue::before { background-color: #3b82f6; }
        .stat-card.emerald::before { background-color: #10b981; }
        .stat-card.rose::before { background-color: #f43f5e; }
        .stat-card.slate::before { background-color: #64748b; }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-card.blue .stat-icon { background-color: #eff6ff; color: #3b82f6; }
        .stat-card.emerald .stat-icon { background-color: #ecfdf5; color: #10b981; }
        .stat-card.rose .stat-icon { background-color: #fff1f2; color: #f43f5e; }
        .stat-card.slate .stat-icon { background-color: #f8fafc; color: #64748b; }

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

        /* Middle Grid Panels */
        .dashboard-middle-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 32px;
        }

        .panel {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.01);
            overflow: hidden;
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
            color: #ef4444;
        }

        /* Pure CSS Conic Donut Chart */
        .chart-container {
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .donut-chart {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: conic-gradient(#ef4444 0% 50%, #f59e0b 50% 75%, #10b981 75% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }

        .donut-hole {
            width: 100px;
            height: 100px;
            background-color: #ffffff;
            border-radius: 50%;
        }

        .chart-legends {
            display: flex;
            gap: 16px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: #475569;
            font-weight: 500;
        }

        .legend-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }
        .legend-dot.pokok { background-color: #ef4444; }
        .legend-dot.wajib { background-color: #f59e0b; }
        .legend-dot.sukarela { background-color: #10b981; }

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
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .table-neraca th {
            font-size: 12px;
            color: #1e293b;
            background-color: #f1f5f9;
        }

        .table-neraca tr.total-row td {
            font-weight: 700;
            background-color: #f8fafc;
            color: #0f172a;
        }

        .badge-status {
            display: inline-flex;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background-color: #fff7ed;
            color: #f97316;
        }

        .btn-action-red {
            background-color: #ef4444;
            color: white;
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }
        .btn-action-red:hover { background-color: #dc2626; }

        /* Sub-navigation Reports */
        .report-nav {
            display: flex;
            gap: 24px;
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .report-nav-item {
            font-size: 12px;
            color: #64748b;
            text-decoration: none;
            cursor: pointer;
            font-weight: 500;
        }
        .report-nav-item:hover { color: #0f172a; }
        .report-nav-item.active {
            color: #ef4444;
            font-weight: 700;
            border-bottom: 2px solid #ef4444;
            padding-bottom: 4px;
        }

    </style>
</head>
<body>

    <!-- Sidebar Menu component -->
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img class="brand-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="width: 28px; height: 28px;">
                <div class="brand-text">
                    <h1>JKOP<span>.ID</span></h1>
                    <p>Panel Ketua</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-item active" onclick="switchTab('dashboard', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                            <span>Dashboard Utama</span>
                        </div>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('verifikasi', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                            <span>Verifikasi Pinjaman</span>
                        </div>
                        <span class="sidebar-badge">{{ $pendingCount }}</span>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('laporan', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                            <span>Laporan Koperasi</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(substr(session('user.nama', 'H. Rahmat'), 0, 2)) }}</div>
            <div class="user-info">
                <h4>{{ session('user.nama', 'H. Rahmat') }}</h4>
                <p>Ketua Koperasi</p>
            </div>
        </div>
    </aside>

    <!-- Main Dynamic Content Segment -->
    <main class="main-content">
        
        <header class="header">
            <div class="header-title">
                <h2>Dashboard Ketua</h2>
                <p>Pengawasan, Persetujuan Akhir & Laporan</p>
            </div>
            <a href="{{ route('logout') }}" class="btn-logout" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar</a>
        </header>

        <!-- TAB 1: DASHBOARD UTAMA -->
        <div id="tab-dashboard" class="tab-content active">
            <div class="stats-grid">
                <div class="stat-card blue">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Anggota</p>
                        <h3>{{ $totalMember }}</h3>
                    </div>
                </div>
                <div class="stat-card emerald">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Simpanan</p>
                        <h3>Rp {{ number_format($totalSimpanan, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card rose">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Piutang Pinjaman</p>
                        <h3>Rp {{ number_format($totalPiutang, 0, ",", ".") }}</h3>
                    </div>
                </div>
                <div class="stat-card slate">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Menunggu Persetujuan</p>
                        <h3>{{ $pendingCount }}</h3>
                    </div>
                </div>
            </div>

            <div class="dashboard-middle-grid">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z"></path></svg>
                            Komposisi Simpanan
                        </div>
                    </div>
                    <div class="chart-container">
                        @php
                            $tTotal = $tPokok + $tWajib + $tSukarela;
                            $pPokok = ($tTotal > 0) ? ($tPokok / $tTotal) * 100 : 33.3;
                            $pWajib = ($tTotal > 0) ? ($tWajib / $tTotal) * 100 : 33.3;
                            
                            $seg1 = round($pPokok, 1);
                            $seg2 = round($pPokok + $pWajib, 1);
                        @endphp
                        <div class="donut-chart" style="background: conic-gradient(#ef4444 0% {{ $seg1 }}%, #f59e0b {{ $seg1 }}% {{ $seg2 }}%, #10b981 {{ $seg2 }}% 100%);">
                            <div class="donut-hole"></div>
                        </div>
                        <div class="chart-legends">
                            <div class="legend-item"><div class="legend-dot pokok"></div> Pokok</div>
                            <div class="legend-item"><div class="legend-dot wajib"></div> Wajib</div>
                            <div class="legend-item"><div class="legend-dot sukarela"></div> Sukarela</div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            Persetujuan Tertunda
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Member</th>
                                <th>Jumlah Ajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingLoans as $pl)
                            <tr>
                                <td>{{ $pl->nama_member }}</td>
                                <td><b>Rp {{ number_format($pl->nominal, 0, ',', '.') }}</b></td>
                                <td>
                                    <div style="display:flex; gap: 8px;">
                                        <form action="{{ route('ketua.pinjaman.verify', $pl->id_pinjaman) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn-action-red" style="background-color: #10b981;">Setuju</button>
                                        </form>
                                        <form action="{{ route('ketua.pinjaman.verify', $pl->id_pinjaman) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn-action-red">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: #94a3b8; padding: 20px;">Tidak ada persetujuan tertunda.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Neraca Ringkas (Statik)
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-neraca">
                        <thead>
                            <tr>
                                <th colspan="2">AKTIVA (Kekayaan)</th>
                                <th colspan="2">PASIVA (Kewajiban & Ekuitas)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kas Koperasi</td>
                                <td style="text-align: right;"><b>Rp {{ number_format($saldoKas, 0, ",", ".") }}</b></td>
                                <td>Simpanan Anggota</td>
                                <td style="text-align: right;"><b>Rp {{ number_format($totalSimpanan, 0, ",", ".") }}</b></td>
                            </tr>
                            <tr>
                                <td>Piutang Anggota</td>
                                <td style="text-align: right;"><b>Rp {{ number_format($totalPiutang, 0, ",", ".") }}</b></td>
                                <td>SHU Berjalan (Laba)</td>
                                <td style="text-align: right;"><b>Rp {{ number_format($totalAktiva - $totalSimpanan, 0, ",", ".") }}</b></td>
                            </tr>
                            <tr>
                                <td>Aset / Inventaris</td>
                                <td style="text-align: right;"><b>Rp {{ number_format($totalAset, 0, ",", ".") }}</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr class="total-row">
                                <td>TOTAL AKTIVA</td>
                                <td style="text-align: right;">Rp {{ number_format($totalAktiva, 0, ",", ".") }}</td>
                                <td>TOTAL PASIVA</td>
                                <td style="text-align: right;">Rp {{ number_format($totalAktiva, 0, ",", ".") }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 2: VERIFIKASI PINJAMAN -->
        <div id="tab-verifikasi" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Verifikasi Pengajuan Pinjaman
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Member</th>
                                <th>Tujuan</th>
                                <th>Jumlah</th>
                                <th>Tenor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingLoans as $pl)
                            <tr>
                                <td><b>{{ $pl->id_pinjaman }}</b></td>
                                <td><b>{{ $pl->nama_member }}</b></td>
                                <td>Pengajuan Pinjaman</td>
                                <td><b>Rp {{ number_format($pl->nominal, 0, ',', '.') }}</b></td>
                                <td>{{ $pl->tenor }} Bln</td>
                                <td><span class="badge-status">Menunggu Ketua</span></td>
                                <td>
                                    <div style="display:flex; gap: 8px;">
                                        <form action="{{ route('ketua.pinjaman.verify', $pl->id_pinjaman) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn-action-red" style="background-color: #10b981;">Setuju</button>
                                        </form>
                                        <form action="{{ route('ketua.pinjaman.verify', $pl->id_pinjaman) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn-action-red">Tolak</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" style="text-align: center; color: #94a3b8; padding: 20px;">Tidak ada verifikasi pinjaman pending.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 3: LAPORAN KOPERASI -->
        <div id="tab-laporan" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Laporan Koperasi
                    </div>
                </div>
                <div class="report-nav">
                    <a class="report-nav-item active" onclick="switchReport('labarugi', this)">Laba / Rugi (SHU)</a>
                    <a class="report-nav-item" onclick="switchReport('neraca', this)">Laporan Neraca</a>
                    <a class="report-nav-item" onclick="switchReport('distribusi', this)">Distribusi SHU</a>
                </div>
                
                <!-- REPORT 1: LABA / RUGI -->
                <div id="report-labarugi" class="report-content" style="padding: 24px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Keterangan Pendapatan & Beban</th>
                                <th style="text-align: right;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Pendapatan Simpanan (Kas Masuk)</td>
                                <td style="text-align: right; color: #10b981; font-weight: 600;">Rp {{ number_format($totalSimpanan, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Total Pengeluaran Kas (Kredit)</td>
                                <td style="text-align: right; color: #ef4444;">- Rp {{ number_format(DB::table('jurnal')->sum('kredit'), 0, ',', '.') }}</td>
                            </tr>
                            <tr style="border-top: 2px solid #e2e8f0; font-weight: 700; background-color: #f8fafc;">
                                <td>Sisa Hasil Usaha (SHU) Bersih</td>
                                <td style="text-align: right; color: #10b981; font-size: 15px;">Rp {{ number_format($totalAktiva - $totalSimpanan, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- REPORT 2: NERACA DETAILED -->
                <div id="report-neraca" class="report-content" style="padding: 24px; display: none;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 50%;">AKTIVA (Kekayaan)</th>
                                <th style="width: 50%; text-align: right;">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Saldo Kas Aktif</td>
                                <td style="text-align: right; font-weight: 600;">Rp {{ number_format($saldoKas, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Piutang Anggota</td>
                                <td style="text-align: right; font-weight: 600;">Rp {{ number_format($totalPiutang, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Aset / Inventaris</td>
                                <td style="text-align: right; font-weight: 600;">Rp {{ number_format($totalAset, 0, ',', '.') }}</td>
                            </tr>
                            <tr style="font-weight: 700; background-color: #f1f5f9;">
                                <td>TOTAL AKTIVA</td>
                                <td style="text-align: right; color: #ef4444;">Rp {{ number_format($totalAktiva, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- REPORT 3: DISTRIBUSI SHU -->
                <div id="report-distribusi" class="report-content" style="padding: 24px; display: none;">
                    @php
                        $shu = $totalAktiva - $totalSimpanan;
                    @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Alokasi Distribusi SHU</th>
                                <th>Persentase</th>
                                <th style="text-align: right;">Jumlah Alokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cadangan Koperasi</td>
                                <td>40%</td>
                                <td style="text-align: right; font-weight: 600;">Rp {{ number_format($shu * 0.40, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                  <td>Jasa Anggota (Simpanan & Pinjaman)</td>
                                  <td>30%</td>
                                  <td style="text-align: right; font-weight: 600;">Rp {{ number_format($shu * 0.30, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                  <td>Dana Pengurus & Pengawas</td>
                                  <td>10%</td>
                                  <td style="text-align: right; font-weight: 600;">Rp {{ number_format($shu * 0.10, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                  <td>Dana Kesejahteraan Karyawan</td>
                                  <td>10%</td>
                                  <td style="text-align: right; font-weight: 600;">Rp {{ number_format($shu * 0.10, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                  <td>Dana Sosial & Pembangunan Daerah</td>
                                  <td>10%</td>
                                  <td style="text-align: right; font-weight: 600;">Rp {{ number_format($shu * 0.10, 0, ',', '.') }}</td>
                              </tr>
                              <tr style="font-weight: 700; background-color: #f8fafc;">
                                  <td colspan="2">TOTAL DISTRIBUSI (100%)</td>
                                  <td style="text-align: right; color: #10b981; font-size: 15px;">Rp {{ number_format($shu, 0, ',', '.') }}</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
            </div>
        </div>

    </main>

    <!-- SPA Logical Script Routing -->
    <script>
        function switchTab(tabId, element) {
            // Remove state configurations from list elements
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Set layout active background target element
            element.classList.add('active');

            // Hide previous data segments mapping visibility
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Target single layer activation segment injection
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        function switchReport(reportId, element) {
            document.querySelectorAll('.report-nav-item').forEach(item => {
                item.classList.remove('active');
            });
            element.classList.add('active');

            document.querySelectorAll('.report-content').forEach(content => {
                content.style.display = 'none';
            });
            document.getElementById('report-' + reportId).style.display = 'block';
        }
    </script>
</body>
</html>