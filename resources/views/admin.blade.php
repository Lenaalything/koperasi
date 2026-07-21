<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - JKOP.ID</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" />
</head>
<body>

    
    <aside class="sidebar">
        <div>
            <div class="sidebar-brand">
                <img class="brand-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="width: 28px; height: 28px;">
                <div class="brand-text">
                    <h1>JKOP<span>.ID</span></h1>
                    <p>Panel Admin</p>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="menu-item active" onclick="switchTab('dashboard', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('member', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                            <span>Manajemen Member</span>
                        </div>
                    </a>
                </li>
                <li class="menu-item" onclick="switchTab('pinjaman', this)">
                    <a class="menu-link">
                        <div>
                            <svg viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                            <span>Administrasi Pinjaman</span>
                        </div>
                        <span class="badge">{{ $pendingCount }}</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="sidebar-user">
            <div class="user-avatar">{{ strtoupper(substr(session('user.nama', 'Budi Santoso'), 0, 2)) }}</div>
            <div class="user-info">
                <h4>{{ session('user.nama', 'Budi Santoso') }}</h4>
                <p>Administrator</p>
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
                    <h2>Dashboard Admin</h2>
                    <p>Manajemen data dan verifikasi awal</p>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="btn-logout" style="text-decoration: none; display: inline-flex; align-items: center; gap: 8px;"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg> Keluar</a>
        </header>

        
        <div id="tab-dashboard" class="tab-content active">
            <div class="stats-grid">
                <div class="stat-card blue">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Member Aktif</p>
                        <h3>{{ $totalMember }}</h3>
                    </div>
                </div>
                <div class="stat-card slate">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Petugas</p>
                        <h3>3</h3>
                    </div>
                </div>
                <div class="stat-card amber">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Pinjaman Pending (Admin)</p>
                        <h3>{{ $pendingCount }}</h3>
                    </div>
                </div>
                <div class="stat-card emerald">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <div class="stat-info">
                        <p>Total Simpanan Member</p>
                        <h3>Rp {{ number_format($totalSimpanan, 0, ",", ".") }}</h3>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title red-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Persetujuan Cepat Pinjaman
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Ajuan</th>
                                <th>Nama Member</th>
                                <th>Jumlah</th>
                                <th>Tujuan</th>
                                <th>Aksi Cepat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendingLoans as $pl)
                            <tr>
                                <td class="font-semibold">{{ $pl->id_pinjaman }}</td>
                                <td>{{ $pl->nama_member }}</td>
                                <td class="font-semibold">Rp {{ number_format($pl->nominal, 0, ",", ".") }}</td>
                                <td>Pengajuan Pinjaman</td>
                                <td>
                                    <form action="{{ route('admin.pinjaman.proses', $pl->id_pinjaman) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn-table-action success">✓ Proses</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="text-align: center; color: #94a3b8; padding: 20px;">Tidak ada pinjaman pending admin.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div id="tab-member" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title red-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Manajemen Member
                    </div>
                    <button class="btn-primary" onclick="toggleAddMemberForm()">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Member
                    </button>
                </div>

                <div id="add-member-form-panel" style="display: none; margin-top: 20px; border-bottom: 1px dashed #e2e8f0; padding-bottom: 24px;">
                    <div style="background-color: #f8fafc; border-radius: 8px; padding: 20px; border: 1px solid #e2e8f0;">
                        <h4 id="form-panel-title" style="margin-bottom: 16px; color: #0f172a; font-weight: 700;">Tambah Member Baru</h4>
                        <form action="{{ route('admin.member.store') }}" method="POST">
                            @csrf
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">ID Member (Auto-generated)</label>
                                    <input type="text" name="id_member" id="form-id-member" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; background-color: #f1f5f9;" value="{{ $nextMemberId }}" readonly required>
                                </div>
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Nama Lengkap</label>
                                    <input type="text" name="nama" id="form-nama" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" required>
                                </div>
                            </div>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Email (NIK)</label>
                                    <input type="email" name="email" id="form-email" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" required>
                                </div>
                                <div>
                                    <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">No. Telepon</label>
                                    <input type="text" name="no_telepon" id="form-no-telepon" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                </div>
                            </div>
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-size: 12px; font-weight: 600; color: #475569; margin-bottom: 6px;">Alamat</label>
                                <textarea name="alamat" id="form-alamat" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; min-height: 70px;" required></textarea>
                            </div>
                            <div style="display: flex; gap: 12px;">
                                <button type="submit" class="btn-table-action success">Simpan</button>
                                <button type="button" class="btn-table-action secondary" onclick="toggleAddMemberForm()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="panel-controls">
                    <div class="search-wrapper">
                        <input type="text" class="search-input" id="search-member-input" onkeyup="filterMember()" placeholder="Cari nama atau NIK...">
                    </div>
                    <select class="select-filter">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Non-Aktif</option>
                    </select>
                </div>

                <div class="table-responsive" style="margin-top: 20px;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="member-table-body">
                            @forelse($member as $m)
                            <tr>
                                <td class="font-semibold">{{ $m->id_member }}</td>
                                <td class="font-semibold">{{ $m->nama }}</td>
                                <td>{{ $m->email }}</td>
                                <td>{{ $m->no_telepon }}</td>
                                <td><span class="status-badge active">{{ ucfirst($m->status) }}</span></td>
                                <td>
                                    <div class="icon-actions">
                                        <button class="icon-btn edit" onclick="editMember('{{ $m->id_member }}', '{{ $m->nama }}', '{{ $m->email }}', '{{ $m->no_telepon }}', '{{ $m->alamat }}')">
                                            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </button>
                                        <form action="{{ route('admin.member.delete', $m->id_member) }}" method="POST" onsubmit="return confirm('Hapus member {{ $m->nama }}?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="icon-btn delete">
                                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 20px;">Belum ada anggota terdaftar.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div id="tab-pinjaman" class="tab-content">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title red-icon">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Administrasi Pinjaman
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Member</th>
                                <th>Jumlah</th>
                                <th>Tenor</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($loans as $ln)
                            <tr>
                                <td class="font-semibold">{{ $ln->id_pinjaman }}</td>
                                <td class="font-semibold">{{ $ln->nama_member }}</td>
                                <td class="font-semibold">Rp {{ number_format($ln->nominal, 0, ",", ".") }}</td>
                                <td>{{ $ln->tenor }} Bln</td>
                                <td>
                                    @if($ln->status === 'approved')
                                        <span class="status-badge active">Disetujui</span>
                                    @elseif($ln->status === 'pending_admin')
                                        <span class="status-badge pending">Pending Admin</span>
                                    @elseif($ln->status === 'pending_ketua')
                                        <span class="status-badge" style="background-color: #f0f9ff; color: #0284c7;">Pending Ketua</span>
                                    @else
                                        <span class="status-badge" style="background-color: #fef2f2; color: #ef4444;">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if($ln->status === 'pending_admin')
                                    <button type="button" class="btn-table-action danger" onclick="showLoanDetail('{{ $ln->id_pinjaman }}', '{{ $ln->nama_member }}', '{{ number_format($ln->nominal, 0, ',', '.') }}', '{{ $ln->tenor }}', '{{ $ln->status }}', true)">Verifikasi</button>
                                    @else
                                    <button type="button" class="btn-table-action secondary" onclick="showLoanDetail('{{ $ln->id_pinjaman }}', '{{ $ln->nama_member }}', '{{ number_format($ln->nominal, 0, ',', '.') }}', '{{ $ln->tenor }}', '{{ $ln->status }}', false)">Detail</button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: #94a3b8; padding: 20px;">Tidak ada riwayat pinjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    
    <script>
        function switchTab(tabId, element) {
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            element.classList.add('active');

            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            document.getElementById('tab-' + tabId).classList.add('active');
        }

        function toggleAddMemberForm() {
            var panel = document.getElementById('add-member-form-panel');
            if (panel.style.display === 'none') {
                panel.style.display = 'block';
                document.getElementById('form-panel-title').innerText = 'Tambah Member Baru';
                document.getElementById('form-id-member').value = '{{ $nextMemberId }}';
                document.getElementById('form-id-member').readOnly = true;
                document.getElementById('form-nama').value = '';
                document.getElementById('form-email').value = '';
                document.getElementById('form-no-telepon').value = '';
                document.getElementById('form-alamat').value = '';
            } else {
                panel.style.display = 'none';
            }
        }

        function editMember(id, nama, email, telepon, alamat) {
            var panel = document.getElementById('add-member-form-panel');
            panel.style.display = 'block';
            document.getElementById('form-panel-title').innerText = 'Edit Member: ' + id;
            document.getElementById('form-id-member').value = id;
            document.getElementById('form-id-member').readOnly = true;
            document.getElementById('form-nama').value = nama;
            document.getElementById('form-email').value = email;
            document.getElementById('form-no-telepon').value = telepon;
            document.getElementById('form-alamat').value = alamat;
        }

        function filterMember() {
            var input = document.getElementById('search-member-input').value.toLowerCase();
            var rows = document.querySelectorAll('#member-table-body tr');
            rows.forEach(row => {
                if (row.cells.length < 6) return;
                var name = row.cells[1].innerText.toLowerCase();
                var email = row.cells[2].innerText.toLowerCase();
                var phone = row.cells[3].innerText.toLowerCase();
                if (name.includes(input) || email.includes(input) || phone.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function showLoanDetail(id, member, nominal, tenor, status, showActions) {
            document.getElementById('modal-loan-id').innerText = id;
            document.getElementById('modal-loan-member').innerText = member;
            document.getElementById('modal-loan-nominal').innerText = 'Rp ' + nominal;
            document.getElementById('modal-loan-tenor').innerText = tenor + ' Bulan';
            
            var statusText = status;
            if (status === 'approved') statusText = 'Disetujui';
            else if (status === 'pending_admin') statusText = 'Pending Admin';
            else if (status === 'pending_ketua') statusText = 'Pending Ketua';
            else if (status === 'rejected') statusText = 'Ditolak';
            
            document.getElementById('modal-loan-status').innerText = statusText;

            var approveForm = document.getElementById('modal-approve-form');
            if (showActions && status === 'pending_admin') {
                approveForm.style.display = 'block';
                approveForm.action = '/admin/pinjaman/proses/' + id;
            } else {
                approveForm.style.display = 'none';
            }

            document.getElementById('loan-detail-modal').style.display = 'flex';
        }

        function closeLoanModal() {
            document.getElementById('loan-detail-modal').style.display = 'none';
        }
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('open');
            document.getElementById('sidebar-overlay').classList.toggle('active');
        }

        function closeSidebar() {
            document.querySelector('.sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('active');
        }
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', () => {
                if (window.innerWidth <= 768) closeSidebar();
            });
        });
    </script>
    
    <div id="loan-detail-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center; padding: 20px;">
        <div style="background-color: white; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); overflow: hidden;">
            <div style="padding: 20px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background-color: #f8fafc;">
                <h4 style="margin: 0; color: #0f172a; font-size: 16px; font-weight: 700;">Detail Pengajuan Pinjaman</h4>
                <button onclick="closeLoanModal()" style="background: none; border: none; font-size: 24px; cursor: pointer; color: #94a3b8; line-height: 1;">&times;</button>
            </div>
            <div style="padding: 24px;">
                <table style="width: 100%; border-collapse: collapse; font-size: 14px; color: #334155; margin-bottom: 24px;">
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; width: 40%; color: #475569;">ID Pinjaman</td>
                        <td style="padding: 12px 0;" id="modal-loan-id">-</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; color: #475569;">Nama Member</td>
                        <td style="padding: 12px 0;" id="modal-loan-member">-</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; color: #475569;">Jumlah Pinjaman</td>
                        <td style="padding: 12px 0; font-weight: 700; color: #ef4444;" id="modal-loan-nominal">-</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; color: #475569;">Tenor</td>
                        <td style="padding: 12px 0;" id="modal-loan-tenor">-</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; color: #475569;">Bunga / Bulan</td>
                        <td style="padding: 12px 0;">1.5% (Flat)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 12px 0; font-weight: 600; color: #475569;">Status</td>
                        <td style="padding: 12px 0;" id="modal-loan-status">-</td>
                    </tr>
                </table>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <form id="modal-approve-form" action="" method="POST" style="display: none;">
                        @csrf
                        <button type="submit" class="btn-table-action success">✓ Proses Ke Ketua</button>
                    </form>
                    <button type="button" onclick="closeLoanModal()" class="btn-table-action secondary">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
    @endif
</body>
</html>