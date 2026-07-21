<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Member - JKOP.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/member.css') }}" />
</head>
<body>

    
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

    
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

    
    <main class="main-content">
        
        <header class="header">
            <div class="header-left">
                <button class="mobile-menu-btn" onclick="toggleSidebar()">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="header-title">
                    <h2 id="dynamic-title">Dashboard Member</h2>
                    <p id="dynamic-subtitle">Selamat datang di panel anggota</p>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('logout') }}" class="btn-logout" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar</a>
            </div>
        </header>

        
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

        
        <div id="tab-loan" class="tab-content">
            <div class="split-grid">
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">
                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Form Pengajuan
                        </div>
                    </div>
                    <form action="{{ route('member.pinjaman.store') }}" method="POST" class="panel-form" onsubmit="return validateLoanForm(this)">
                        @csrf
                        <div class="form-group">
                            <label>Jumlah Pinjaman (Rp)</label>
                            <input type="number" name="nominal" id="input-nominal-pinjaman" class="form-control" placeholder="Contoh: 5000000" onchange="checkNumberInput(this)" required>
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

    
    <script>
        function switchTab(tabId, element, titleText, subtitleText) {
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            element.classList.add('active');

            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.getElementById('tab-' + tabId).classList.add('active');

            document.getElementById('dynamic-title').innerText = titleText;
            document.getElementById('dynamic-subtitle').innerText = subtitleText;

            if (window.innerWidth <= 768) closeSidebar();
        }

        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
            document.getElementById('sidebar-overlay').classList.toggle('active');
        }

        function closeSidebar() {
            document.querySelector('.sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('active');
        }

        function checkNumberInput(input) {
            var val = parseFloat(input.value);
            if (val < 1) {
                alert('Nominal tidak boleh kurang dari 1!');
                input.value = '';
            }
        }

        function validateLoanForm(form) {
            var nominal = parseFloat(form.nominal.value);
            if (isNaN(nominal) || nominal < 1) {
                alert('Nominal pinjaman tidak boleh kurang dari 1!');
                return false;
            } else {
                return true;
            }
        }
    </script>
    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif
</body>
</html>