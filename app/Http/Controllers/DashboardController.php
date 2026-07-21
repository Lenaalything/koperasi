<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    private function checkRole($allowedRole)
    {
        if (!Session::has('user')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $user = Session::get('user');
        $userRole = $user['role'] ?? null;

        if ($userRole !== $allowedRole) {
            switch ($userRole) {
                case 'admin':
                    return redirect()->route('admin')->with('error', 'Akses ditolak! Anda tidak memiliki akses ke halaman tersebut.');
                case 'bendahara':
                    return redirect()->route('bendahara')->with('error', 'Akses ditolak! Anda tidak memiliki akses ke halaman tersebut.');
                case 'ketua':
                    return redirect()->route('ketua')->with('error', 'Akses ditolak! Anda tidak memiliki akses ke halaman tersebut.');
                case 'member':
                default:
                    return redirect()->route('member')->with('error', 'Akses ditolak! Anda tidak memiliki akses ke halaman tersebut.');
            }
        }

        return null;
    }

    // MEMBER DASHBOARD
    public function member()
    {
        if ($redirect = $this->checkRole('member')) return $redirect;

        $user = Session::get('user');
        $id_member = $user['id'] ?? 'M001';
        $member = DB::table('member')->where('id_member', $id_member)->first();

        // hitung simpanan
        $simpananPokok = DB::table('simpanan')->where('id_member', $id_member)->where('jenis_simp', 'pokok')->sum('nominal');
        $simpananWajib = DB::table('simpanan')->where('id_member', $id_member)->where('jenis_simp', 'wajib')->sum('nominal');
        $simpananSukarela = DB::table('simpanan')->where('id_member', $id_member)->where('jenis_simp', 'sukarela')->sum('nominal');
        $totalSimpanan = $simpananPokok + $simpananWajib + $simpananSukarela;

        // cek status aproved
        $activeLoan = DB::table('pinjaman')
            ->where('id_member', $id_member)
            ->where('status', 'approved')
            ->first();

        $paidMonths = 0;
        $totalPaid = 0;
        $sisaPinjaman = 0;
        if ($activeLoan) {
            $paidMonths = DB::table('angsuran')
                ->where('id_member', $id_member)
                ->where('id_pinjaman', $activeLoan->id_pinjaman)
                ->where('status_bayar', 'lunas')
                ->count();
            $totalPaid = DB::table('angsuran')
                ->where('id_member', $id_member)
                ->where('id_pinjaman', $activeLoan->id_pinjaman)
                ->where('status_bayar', 'lunas')
                ->sum('nominal');
            $sisaPinjaman = $activeLoan->nominal - $totalPaid;
        }

        // tampilin histori pinjaman
        $simpanan = DB::table('simpanan')
            ->where('id_member', $id_member)
            ->orderBy('tgl_simpan', 'desc')
            ->get();

        // Loan Applications — gabungkan dari tabel aktif + arsip
        $loansAktif = DB::table('pinjaman')
            ->where('id_member', $id_member)
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        $loansArsip = DB::table('pinjaman_arsip')
            ->where('id_member', $id_member)
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        $loans = $loansAktif->merge($loansArsip)->sortByDesc('tgl_ajuan');

        // Installments — ambil semua angsuran member
        $angsuran = DB::table('angsuran')
            ->where('id_member', $id_member)
            ->orderBy('tgl_bayar', 'desc')
            ->get();

        return view('member', compact(
            'member', 'simpananPokok', 'simpananWajib', 'simpananSukarela', 'totalSimpanan',
            'activeLoan', 'paidMonths', 'totalPaid', 'sisaPinjaman', 'simpanan', 'loans', 'angsuran'
        ));
    }

    public function storePinjaman(Request $request)
    {
        if ($redirect = $this->checkRole('member')) return $redirect;

        $user = Session::get('user');
        $id_member = $user['id'] ?? 'M001';
        $nominal = abs((float) $request->input('nominal'));
        if ($nominal <= 0) {
            return redirect()->back()->with('error', 'Nominal pinjaman harus lebih besar dari 0!');
        }
        $tenor = $request->input('tenor');

        $maxAktif  = DB::table('pinjaman')->max('id_pinjaman');       
        $maxArsip  = DB::table('pinjaman_arsip')->max('id_pinjaman');
        $maxAll    = max($maxAktif ?? 'L000', $maxArsip ?? 'L000');
        $nextNum   = (int) ltrim(substr($maxAll, 1), '0') + 1; 
        $id_pinjaman = 'L' . str_pad($nextNum, 3, '0', STR_PAD_LEFT);

        DB::table('pinjaman')->insert([
            'id_pinjaman'  => $id_pinjaman,
            'id_member'    => $id_member,
            'id_petugas'   => 'P001',
            'tgl_ajuan'    => now()->toDateString(),
            'status'       => 'pending_admin',
            'tenor'        => $tenor,
            'bunga'        => 1.5,
            'nominal'      => $nominal,
            'sisa_pinjaman'=> $nominal,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('member')->with('success', 'Pengajuan pinjaman berhasil diajukan!');
    }

    // ADMIN DASHBOARD
    public function admin()
    {
        if ($redirect = $this->checkRole('admin')) return $redirect;

        $totalMember = DB::table('member')->count();
        
        $pendingLoans = DB::table('pinjaman')
            ->join('member', 'pinjaman.id_member', '=', 'member.id_member')
            ->where('pinjaman.status', 'pending_admin')
            ->select('pinjaman.*', 'member.nama as nama_member')
            ->get();
            
        $pendingCount = $pendingLoans->count();

        // Total Simpanan Member
        $totalSimpanan = DB::table('simpanan')->sum('nominal');

        // Members list
        $member = DB::table('member')->get();

        // All Loans — gabung tabel aktif + arsip untuk laporan admin
        $loansAktif = DB::table('pinjaman')
            ->join('member', 'pinjaman.id_member', '=', 'member.id_member')
            ->select('pinjaman.*', 'member.nama as nama_member')
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        $loansArsip = DB::table('pinjaman_arsip')
            ->join('member', 'pinjaman_arsip.id_member', '=', 'member.id_member')
            ->select('pinjaman_arsip.*', 'member.nama as nama_member')
            ->orderBy('tgl_ajuan', 'desc')
            ->get();
        $loans = $loansAktif->merge($loansArsip)->sortByDesc('tgl_ajuan');

        $maxMember   = DB::table('member')->max('id_member'); // misal 'M007'
        $nextMemberNum = (int) ltrim(substr($maxMember ?? 'M000', 1), '0') + 1;
        $nextMemberId  = 'M' . str_pad($nextMemberNum, 3, '0', STR_PAD_LEFT);

        return view('admin', compact('totalMember', 'pendingLoans', 'pendingCount', 'totalSimpanan', 'member', 'loans', 'nextMemberId'));
    }

    public function prosesPinjamanAdmin($id_pinjaman)
    {
        if ($redirect = $this->checkRole('admin')) return $redirect;

        DB::table('pinjaman')
            ->where('id_pinjaman', $id_pinjaman)
            ->update([
                'status' => 'pending_ketua',
                'updated_at' => now()
            ]);

        return redirect()->route('admin')->with('success', 'Pinjaman diteruskan ke Ketua Koperasi!');
    }

    public function storeMember(Request $request)
    {
        if ($redirect = $this->checkRole('admin')) return $redirect;

        $id_member = $request->input('id_member');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $no_telepon = $request->input('no_telepon');
        $email = $request->input('email');
        $status = $request->input('status', 'aktif');

        $exists = DB::table('member')->where('id_member', $id_member)->exists();

        if ($exists) {
            DB::table('member')
                ->where('id_member', $id_member)
                ->update([
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'no_telepon' => $no_telepon,
                    'email' => $email,
                    'status' => $status,
                    'updated_at' => now()
                ]);
        } else {
            DB::table('member')->insert([
                'id_member' => $id_member,
                'nama' => $nama,
                'alamat' => $alamat,
                'no_telepon' => $no_telepon,
                'email' => $email,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('admin')->with('success', 'Data member berhasil disimpan!');
    }

    public function deleteMember($id_member)
    {
        if ($redirect = $this->checkRole('admin')) return $redirect;

        DB::table('member')->where('id_member', $id_member)->delete();
        return redirect()->route('admin')->with('success', 'Member berhasil dihapus!');
    }

    // BENDAHARA DASHBOARD
    public function bendahara()
    {
        if ($redirect = $this->checkRole('bendahara')) return $redirect;

        $debit = DB::table('jurnal')->sum('debit');
        $kredit = DB::table('jurnal')->sum('kredit');
        $saldo = $debit - $kredit;

        $totalAset = DB::table('aset')->sum('nilai_perolehan');

        $jurnal = DB::table('jurnal')->orderBy('tgl_transaksi', 'desc')->get();

        $aset = DB::table('aset')->get();

        $member = DB::table('member')->where('status', 'aktif')->get();
        $loans = DB::table('pinjaman')
            ->join('member', 'pinjaman.id_member', '=', 'member.id_member')
            ->where('pinjaman.status', 'approved')
            ->select('pinjaman.*', 'member.nama as nama_member')
            ->get();

        $recentSimpanan = DB::table('simpanan')
            ->join('member', 'simpanan.id_member', '=', 'member.id_member')
            ->select('simpanan.*', 'member.nama as nama_member')
            ->orderBy('tgl_simpan', 'desc')
            ->limit(5)
            ->get();

        $recentAngsuran = DB::table('angsuran')
            ->join('member', 'angsuran.id_member', '=', 'member.id_member')
            ->select('angsuran.*', 'member.nama as nama_member')
            ->orderBy('tgl_bayar', 'desc')
            ->limit(5)
            ->get();

        return view('bendahara', compact(
            'debit', 'kredit', 'saldo', 'totalAset', 'jurnal', 'aset', 'member', 'loans', 'recentSimpanan', 'recentAngsuran'
        ));
    }

    public function storeSimpanan(Request $request)
    {
        if ($redirect = $this->checkRole('bendahara')) return $redirect;

        $id_member = $request->input('id_member');
        $jenis_simp = $request->input('jenis_simp');
        $nominal = abs((float) $request->input('nominal'));
        if ($nominal <= 0) {
            return redirect()->back()->with('error', 'Nominal simpanan harus lebih besar dari 0!');
        }
        $tgl_simpan = $request->input('tgl_simpan');

        $count = DB::table('simpanan')->count();
        $id_simpanan = 'S' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        DB::table('simpanan')->insert([
            'id_simpanan' => $id_simpanan,
            'id_member' => $id_member,
            'id_petugas' => 'P002', 
            'jenis_simp' => $jenis_simp,
            'nominal' => $nominal,
            'tgl_simpan' => $tgl_simpan,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // tambah ke jurnal
        $member = DB::table('member')->where('id_member', $id_member)->first();
        DB::table('jurnal')->insert([
            'id_jurnal' => 'J' . str_pad(DB::table('jurnal')->count() + 1, 3, '0', STR_PAD_LEFT),
            'id_petugas' => 'P002',
            'tgl_transaksi' => $tgl_simpan,
            'deskripsi' => 'Setoran Simpanan ' . ucfirst($jenis_simp) . ' - ' . $member->nama,
            'debit' => $nominal,
            'kredit' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('bendahara')->with('success', 'Transaksi simpanan berhasil disimpan!');
    }

    public function storeAngsuran(Request $request)
    {
        if ($redirect = $this->checkRole('bendahara')) return $redirect;

        $id_pinjaman = $request->input('id_pinjaman');
        $nominal = abs((float) $request->input('nominal'));
        if ($nominal <= 0) {
            return redirect()->back()->with('error', 'Nominal angsuran harus lebih besar dari 0!');
        }
        $tgl_bayar = $request->input('tgl_bayar');

        $loan = DB::table('pinjaman')->where('id_pinjaman', $id_pinjaman)->first();

        $ke_angsuran = DB::table('angsuran')
            ->where('id_member', $loan->id_member)
            ->where('id_pinjaman', $id_pinjaman)
            ->count() + 1;

        $count = DB::table('angsuran')->count();
        $id_angsuran = 'A' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        DB::table('angsuran')->insert([
            'id_angsuran'  => $id_angsuran,
            'id_pinjaman'  => $id_pinjaman,
            'id_member'    => $loan->id_member,
            'id_petugas'   => 'P002',
            'ke_angsuran'  => $ke_angsuran,
            'nominal'      => $nominal,
            'tgl_bayar'    => $tgl_bayar,
            'tgl_jatuh_tmp'=> $tgl_bayar,
            'status_bayar' => 'lunas',
            'created_at'   => now(),
            'updated_at'   => now()
        ]);


        $totalSudahBayar = DB::table('angsuran')
            ->where('id_pinjaman', $id_pinjaman)
            ->where('status_bayar', 'lunas')
            ->sum('nominal');
        $sisaPinjaman = $loan->nominal - $totalSudahBayar;

        if ($ke_angsuran >= $loan->tenor || $sisaPinjaman <= 0) {

            DB::table('pinjaman_arsip')->insertOrIgnore([
                'id_pinjaman'  => $loan->id_pinjaman,
                'id_member'    => $loan->id_member,
                'id_petugas'   => $loan->id_petugas,
                'tgl_ajuan'    => $loan->tgl_ajuan,
                'status'       => 'lunas',
                'tenor'        => $loan->tenor,
                'bunga'        => $loan->bunga,
                'nominal'      => $loan->nominal,
                'sisa_pinjaman'=> 0,
                'tgl_lunas'    => now()->toDateString(),
                'created_at'   => $loan->created_at,
                'updated_at'   => now(),
            ]);
            DB::table('pinjaman')->where('id_pinjaman', $id_pinjaman)->delete();
        } else {
            DB::table('pinjaman')->where('id_pinjaman', $id_pinjaman)->update([
                'sisa_pinjaman'=> $sisaPinjaman,
                'updated_at'   => now()
            ]);
        }

        $member = DB::table('member')->where('id_member', $loan->id_member)->first();
        DB::table('jurnal')->insert([
            'id_jurnal'     => 'J' . str_pad(DB::table('jurnal')->count() + 1, 3, '0', STR_PAD_LEFT),
            'id_petugas'    => 'P002',
            'tgl_transaksi' => $tgl_bayar,
            'deskripsi'     => 'Pembayaran Angsuran ke-' . $ke_angsuran . ' - ' . $member->nama,
            'debit'         => $nominal,
            'kredit'        => 0,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        return redirect()->route('bendahara')->with('success', 'Transaksi angsuran berhasil disimpan!');
    }

    public function storeAset(Request $request)
    {
        if ($redirect = $this->checkRole('bendahara')) return $redirect;

        $id_aset = $request->input('id_aset');
        $nama_aset = $request->input('nama_aset');
        $kategori = $request->input('kategori');
        $nilai = abs((float) $request->input('nilai_perolehan'));
        if ($nilai <= 0) {
            return redirect()->back()->with('error', 'Nilai perolehan aset harus lebih besar dari 0!');
        }
        $kondisi = $request->input('kondisi');
        $tgl_perolehan = $request->input('tgl_perolehan');

        if ($id_aset) {
            DB::table('aset')
                ->where('id_aset', $id_aset)
                ->update([
                    'nama_aset' => $nama_aset,
                    'kategori' => $kategori,
                    'nilai_perolehan' => $nilai,
                    'tgl_perolehan' => $tgl_perolehan,
                    'kondisi' => $kondisi,
                    'updated_at' => now()
                ]);
            return redirect()->route('bendahara')->with('success', 'Aset berhasil diupdate!');
        } else {
            $count = DB::table('aset')->count();
            $id_aset = 'AS' . str_pad($count + 1, 3, '0', STR_PAD_LEFT);

            DB::table('aset')->insert([
                'id_aset' => $id_aset,
                'id_petugas' => 'P002',
                'nama_aset' => $nama_aset,
                'kategori' => $kategori,
                'nilai_perolehan' => $nilai,
                'tgl_perolehan' => $tgl_perolehan,
                'kondisi' => $kondisi,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('jurnal')->insert([
                'id_jurnal' => 'J' . str_pad(DB::table('jurnal')->count() + 1, 3, '0', STR_PAD_LEFT),
                'id_petugas' => 'P002',
                'tgl_transaksi' => $tgl_perolehan,
                'deskripsi' => 'Pembelian Aset: ' . $nama_aset,
                'debit' => 0,
                'kredit' => $nilai,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return redirect()->route('bendahara')->with('success', 'Data aset berhasil disimpan!');
        }
    }

    // KETUA DASHBOARD
    public function ketua()
    {
        if ($redirect = $this->checkRole('ketua')) return $redirect;

        $totalMember = DB::table('member')->where('status', 'aktif')->count();
        $totalSimpanan = DB::table('simpanan')->sum('nominal');

        $totalPiutang = DB::table('pinjaman')->where('status', 'approved')->sum('nominal');

        $pendingLoans = DB::table('pinjaman')
            ->join('member', 'pinjaman.id_member', '=', 'member.id_member')
            ->where('pinjaman.status', 'pending_ketua')
            ->select('pinjaman.*', 'member.nama as nama_member')
            ->get();
        $pendingCount = $pendingLoans->count();

        $tPokok = DB::table('simpanan')->where('jenis_simp', 'pokok')->sum('nominal');
        $tWajib = DB::table('simpanan')->where('jenis_simp', 'wajib')->sum('nominal');
        $tSukarela = DB::table('simpanan')->where('jenis_simp', 'sukarela')->sum('nominal');

        $debit = DB::table('jurnal')->sum('debit');
        $kredit = DB::table('jurnal')->sum('kredit');
        $saldoKas = $debit - $kredit;
        $totalAset = DB::table('aset')->sum('nilai_perolehan');
        $totalAktiva = $saldoKas + $totalPiutang + $totalAset;

        return view('ketua', compact(
            'totalMember', 'totalSimpanan', 'totalPiutang', 'pendingLoans', 'pendingCount',
            'tPokok', 'tWajib', 'tSukarela', 'saldoKas', 'totalAset', 'totalAktiva'
        ));
    }

    public function verifikasiPinjamanKetua(Request $request, $id_pinjaman)
    {
        if ($redirect = $this->checkRole('ketua')) return $redirect;

        $status = $request->input('status'); 
        $loan   = DB::table('pinjaman')
            ->join('member', 'pinjaman.id_member', '=', 'member.id_member')
            ->where('pinjaman.id_pinjaman', $id_pinjaman)
            ->select('pinjaman.*', 'member.nama as nama_member')
            ->first();

        if ($status === 'approved') {
            DB::table('pinjaman')
                ->where('id_pinjaman', $id_pinjaman)
                ->update([
                    'status'    => 'approved',
                    'updated_at'=> now()
                ]);

            DB::table('jurnal')->insert([
                'id_jurnal'     => 'J' . str_pad(DB::table('jurnal')->count() + 1, 3, '0', STR_PAD_LEFT),
                'id_petugas'    => 'P003',
                'tgl_transaksi' => now()->toDateString(),
                'deskripsi'     => 'Pencairan Pinjaman - ' . $loan->nama_member,
                'debit'         => 0,
                'kredit'        => $loan->nominal,
                'created_at'    => now(),
                'updated_at'    => now()
            ]);

        } elseif ($status === 'rejected') {
            DB::table('pinjaman_arsip')->insertOrIgnore([
                'id_pinjaman'  => $loan->id_pinjaman,
                'id_member'    => $loan->id_member,
                'id_petugas'   => $loan->id_petugas,
                'tgl_ajuan'    => $loan->tgl_ajuan,
                'status'       => 'rejected',
                'tenor'        => $loan->tenor,
                'bunga'        => $loan->bunga,
                'nominal'      => $loan->nominal,
                'sisa_pinjaman'=> $loan->nominal,
                'tgl_lunas'    => null,
                'created_at'   => $loan->created_at,
                'updated_at'   => now(),
            ]);
            DB::table('pinjaman')->where('id_pinjaman', $id_pinjaman)->delete();
        }

        return redirect()->route('ketua')->with('success', 'Keputusan pinjaman berhasil disimpan!');
    }
}
