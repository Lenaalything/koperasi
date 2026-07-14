<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Seed Petugas
        DB::table('petugas')->insert([
            [
                'id_petugas' => 'P001',
                'nama' => 'Budi Santoso',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'hak_akses' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_petugas' => 'P002',
                'nama' => 'Wahyu Ningsih',
                'username' => 'bendahara',
                'password' => Hash::make('password'),
                'hak_akses' => 'bendahara',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_petugas' => 'P003',
                'nama' => 'H. Rahmat',
                'username' => 'ketua',
                'password' => Hash::make('password'),
                'hak_akses' => 'ketua',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 2. Seed Members
        DB::table('members')->insert([
            [
                'id_member' => 'M001',
                'nama' => 'Ahmad Fauzi',
                'alamat' => 'Bukit Cimanggu City Blok M2 No.5, Bogor',
                'no_telepon' => '081234567890',
                'email' => 'ahmad@gmail.com',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_member' => 'M002',
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Raya Padjadjaran No. 5, Bogor',
                'no_telepon' => '081298765432',
                'email' => 'siti@gmail.com',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 3. Seed Simpanans
        DB::table('simpanans')->insert([
            [
                'id_simpanan' => 'S001',
                'id_member' => 'M001',
                'id_petugas' => 'P002',
                'jenis_simp' => 'pokok',
                'nominal' => 500000,
                'tgl_simpan' => '2026-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_simpanan' => 'S002',
                'id_member' => 'M001',
                'id_petugas' => 'P002',
                'jenis_simp' => 'wajib',
                'nominal' => 2400000,
                'tgl_simpan' => '2026-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_simpanan' => 'S003',
                'id_member' => 'M001',
                'id_petugas' => 'P002',
                'jenis_simp' => 'sukarela',
                'nominal' => 1500000,
                'tgl_simpan' => '2026-07-01',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 4. Seed Pinjamans
        DB::table('pinjamans')->insert([
            [
                'id_pinjaman' => 'L001',
                'id_member' => 'M001',
                'id_petugas' => 'P001',
                'tgl_ajuan' => '2026-06-01',
                'status' => 'approved',
                'tenor' => 12,
                'bunga' => 1.5,
                'nominal' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pinjaman' => 'L002',
                'id_member' => 'M002',
                'id_petugas' => 'P001',
                'tgl_ajuan' => '2026-07-14',
                'status' => 'pending_admin',
                'tenor' => 24,
                'bunga' => 1.5,
                'nominal' => 10000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 5. Seed Angsurans
        DB::table('angsurans')->insert([
            [
                'id_angsuran' => 'A001',
                'id_member' => 'M001',
                'id_petugas' => 'P002',
                'ke_angsuran' => 1,
                'nominal' => 458333,
                'tgl_bayar' => '2026-07-10',
                'tgl_jatuh_tmp' => '2026-07-10',
                'status_bayar' => 'lunas',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 6. Seed Asets
        DB::table('asets')->insert([
            [
                'id_aset' => 'AS001',
                'id_petugas' => 'P002',
                'nama_aset' => 'Laptop Asus Pro',
                'kategori' => 'Elektronik',
                'nilai_perolehan' => 8000000,
                'tgl_perolehan' => '2026-06-08',
                'kondisi' => 'baik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_aset' => 'AS002',
                'id_petugas' => 'P002',
                'nama_aset' => 'Meja Kantor Kayu',
                'kategori' => 'Furnitur',
                'nilai_perolehan' => 1500000,
                'tgl_perolehan' => '2026-06-10',
                'kondisi' => 'cukup',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // 7. Seed Jurnals
        DB::table('jurnals')->insert([
            [
                'id_jurnal' => 'J001',
                'id_petugas' => 'P002',
                'tgl_transaksi' => '2026-06-01',
                'deskripsi' => 'Setoran Awal Simpanan Pokok Ahmad Fauzi',
                'debit' => 500000,
                'kredit' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jurnal' => 'J002',
                'id_petugas' => 'P002',
                'tgl_transaksi' => '2026-06-08',
                'deskripsi' => 'Pembelian Aset Laptop Asus Pro',
                'debit' => 0,
                'kredit' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_jurnal' => 'J003',
                'id_petugas' => 'P002',
                'tgl_transaksi' => '2026-07-10',
                'deskripsi' => 'Pembayaran Angsuran ke-1 Ahmad Fauzi',
                'debit' => 458333,
                'kredit' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}