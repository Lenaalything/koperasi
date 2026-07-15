# Sistem Informasi Koperasi (JKOP.ID)

Aplikasi ini adalah Sistem Informasi Koperasi (JKOP.ID) berbasis web yang dikembangkan menggunakan framework Laravel. Sistem ini dirancang untuk mempermudah pengelolaan operasional koperasi, termasuk manajemen keanggotaan, simpanan, pinjaman, angsuran, serta pencatatan aset dan jurnal keuangan.

Fitur Utama

Sistem ini mendukung 4 peran (role) pengguna dengan hak akses yang berbeda:

### 1. Member (Anggota)
- Melihat ringkasan simpanan (Pokok, Wajib, Sukarela).
- Melihat status dan sisa pinjaman aktif.
- Mengajukan pinjaman baru.
- Melihat riwayat simpanan dan riwayat pembayaran angsuran.

### 2. Admin
- Mengelola data anggota (Member).
- Melihat daftar pengajuan pinjaman dari anggota.
- Memproses pengajuan pinjaman untuk diteruskan ke Ketua Koperasi.

### 3. Bendahara
- Mencatat setoran simpanan anggota.
- Mencatat pembayaran angsuran pinjaman.
- Mengelola data aset koperasi.
- Melihat ringkasan neraca kas (Jurnal Debit/Kredit).

### 4. Ketua Koperasi
- Melihat laporan statistik koperasi (Total Member, Total Simpanan, Piutang, Saldo Kas, dll).
- Memverifikasi (Approve/Reject) pengajuan pinjaman yang telah diproses oleh Admin.

## Teknologi yang Digunakan
- **Framework:** Laravel 9
- **Bahasa:** PHP 
- **Database:** MySQL
- **Frontend:** HTML, CSS (Vanilla), JavaScript, Blade Templating Engine

##  Persyaratan Sistem
- PHP >= 8.0.2
- Composer
- MySQL Database

##  Panduan Instalasi
1. Clone repositori ini atau salin folder proyek ke dalam direktori web server Anda (misal: `htdocs` untuk XAMPP).
2. Salin file `.env.example` menjadi `.env` dan konfigurasikan koneksi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=koperasi
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Buka terminal di direktori proyek dan jalankan perintah berikut untuk menginstal dependensi:
   ```bash
   composer install
   ```
4. Generate *application key*:
   ```bash
   php artisan key:generate
   ```

##  Akses Login
- Halaman login dapat diakses melalui rute `/login`.
- **Username untuk petugas:** `admin`, `bendahara`, atau `ketua`.
- **Username untuk member:** Sesuai dengan yang didaftarkan (atau dapat mencoba `member` untuk purwarupa/testing).
---
*Dibuat menggunakan Laravel Framework.*
