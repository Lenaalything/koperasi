@extends('layouts.app')

@section('content')

<!-- Navbar (Ditambahkan kembali) -->
<nav class="navbar">
  <div class="container navbar-container">
    <a href="#" class="navbar-brand">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Logo JKOP" style="width: 28px; height: 28px;">
      JKOP.<span>ID</span>
    </a>
    <div>
      <a href="{{ route('register') }}" class="btn btn-primary btn-sm">DAFTAR SEGERA</a>
    </div>
  </div>
</nav>

<section id="hero" class="hero-section">
  <div class="container hero-container">
    <div class="hero-content">
      <h1 class="hero-title">
        Sistem Informasi Koperasi Terintegrasi & Transparan
      </h1>
      <p class="hero-subtitle">
        Selamat datang di JKOP.ID. Platform digital berbasis web responsif untuk
        mempermudah manajemen data member, efisiensi simpan pinjam, serta
        pembukuan jurnal otomatis yang aman dan terpusat.
      </p>
      <div class="hero-actions">
        <a href="{{ route('login') }}" class="btn btn-primary">
          <span>MULAI SEKARANG</span>
          <i class="bi bi-arrow-right" style="color: white; margin-left: 8px;"></i>
        </a>
        <a href="#" class="btn btn-secondary">
          <i class="bi bi-play-circle-fill" style="margin-right: 8px; color: var(--primary);"></i>
          <span>Pelajari Lebih Lanjut</span>
        </a>
      </div>
    </div>
  </div>
  <div class="hero-wave">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" style="width: 100%; height: 100px; display: block;">
      <path d="M0,60 C360,120 720,0 1080,60 C1260,90 1380,60 1440,40 L1440,120 L0,120 Z" fill="#ffffff"/>
    </svg>
  </div>
</section>



<section id="about" class="about-section">
  <div class="about-bg-decoration"></div>
  <div class="container about-container">
    <div class="about-image-column">
      <div class="about-image-wrapper">
        <div class="about-image-border"></div>
        <img
          src="{{ asset('assets/img/about-image.png') }}"
          alt="About JKOP.ID Team"
          class="about-main-img"
        />
        <div class="about-floating-card">
          <i class="bi bi-shield-check" style="font-size: 1.8rem; color: var(--primary); margin-right: 12px;"></i>
          <div class="floating-text">
            <strong>Terpercaya</strong>
            <span>150+ Koperasi</span>
          </div>
        </div>
      </div>
    </div>
    <div class="about-content-column">
      <div class="badge">
        Tentang Kami
      </div>
      <h2 class="section-title">Tentang JKOP.ID</h2>
      <div class="about-description">
        <p>
          JKOP merupakan platform sistem informasi terintegrasi yang memberikan
          layanan digitasi bagi koperasi dalam bentuk penyediaan arsitektur web
          responsif, manajemen simpan pinjam, pembukuan jurnal otomatis, dan
          pengelolaan aset.
        </p>
        <p>
          Tujuannya agar koperasi dapat mengeliminasi proses administrasi
          konvensional guna menunjang bisnis melalui peningkatan efisiensi,
          akurasi data transaksi, serta transparansi pelaporan keuangan bagi
          seluruh pengurus dan anggota.
        </p>
        <p>
          Dengan sistem manajemen yang mengesankan, koperasi Anda akan memiliki
          alat yang efektif untuk menyebarkan informasi, mengamankan data
          sensitif dengan enkripsi, dan mendorong pertumbuhan operasional
          koperasi yang berkelanjutan
        </p>
      </div>
      <div class="about-features-grid">
        <div class="about-feature-item">
          <i class="bi bi-check-circle-fill" style="color: var(--primary); margin-right: 8px; font-size: 1.1rem;"></i>
          <span>Web Responsif Multi-Role</span>
        </div>
        <div class="about-feature-item">
          <i class="bi bi-check-circle-fill" style="color: var(--primary); margin-right: 8px; font-size: 1.1rem;"></i>
          <span>Manajemen Simpan Pinjam</span>
        </div>
        <div class="about-feature-item">
          <i class="bi bi-check-circle-fill" style="color: var(--primary); margin-right: 8px; font-size: 1.1rem;"></i>
          <span>Manajemen Aset Terintegrasi</span>
        </div>
        <div class="about-feature-item">
          <i class="bi bi-check-circle-fill" style="color: var(--primary); margin-right: 8px; font-size: 1.1rem;"></i>
          <span>Dukungan Teknis</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="features" class="features-section">
  <div class="container">
    <div class="features-header">
      <div
        class="badge"
        style="background-color: rgba(230, 57, 70, 0.15); border: 1px solid rgba(230, 57, 70, 0.25);"
      >
        Solusi Kami
      </div>
      <h2 class="section-title text-white">Website JKOP.ID</h2>
      <p class="features-desc">
        Manfaat yang anda dapatkan dengan website JKOP.ID
      </p>
    </div>
    <div class="features-grid">
      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-rocket-takeoff" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Akselerasi Operasional</h3>
        <p class="feature-text">
          Mendorong efisiensi kerja pengurus koperasi lewat otomatisasi sistem
          administrasi berbasis arsitektur 3-Tier yang cepat dan responsif.
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-shield-lock" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Keamanan Terpusat</h3>
        <p class="feature-text">
          Perlindungan penuh sistem dengan enkripsi data sensitif pada tingkat
          basis data serta pembatasan hak akses berbasis role.
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-arrow-left-right" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Alur Kerja Interaktif</h3>
        <p class="feature-text">
          Mempermudah interaksi operasional antar-aktor, seperti pengajuan
          pinjaman mandiri oleh member hingga validasi oleh Ketua.
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-layout-text-sidebar-reverse" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Modul Terintegrasi</h3>
        <p class="feature-text">
          Menyediakan fitur lengkap mulai dari manajemen data member, simpan
          pinjam, hingga manajemen aset dalam satu paket platform.
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-hdd-network" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Kemudahan Akses</h3>
        <p class="feature-text">
          Platform terpusat berbasis arsitektur Client-Server yang dapat diakses
          oleh anggota dan pengurus kapan saja dan di mana saja
        </p>
      </div>

      <div class="feature-card">
        <div class="feature-card-border"></div>
        <div class="feature-icon">
          <i class="bi bi-bar-chart-line" style="font-size: 2rem; color: var(--primary);"></i>
        </div>
        <h3 class="feature-title">Membangun Transparansi</h3>
        <p class="feature-text">
          Meningkatkan kepercayaan anggota melalui otomatisasi laporan keuangan
          neraca dan laba rugi secara akurat.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="contact-section">
  <div class="container">
    <div class="contact-header">
      <div class="badge">
        Hubungi Kami
      </div>
      <h2 class="section-title">Kontak</h2>
      <p class="contact-desc">
        Jadilah bagian dari transformasi digital koperasi Indonesia dengan
        menghadirkan website koperasi Anda di JKOP.ID. Bersama-sama, kita bangun
        ekosistem koperasi digital yang lebih kuat, modern, dan berdaya saing.
      </p>
    </div>
    <div class="contact-grid">
      <div class="contact-info-wrapper">
        <div class="contact-info-card">
          <div class="contact-info-item">
            <div class="contact-icon">
              <i class="bi bi-geo-alt-fill" style="font-size: 1.5rem; color: var(--primary);"></i>
            </div>
            <div class="contact-text">
              <h4>Alamat</h4>
              <p>
                Jl. Dr. O. Notohamidjojo No.1 - 10, Blotongan, Kec. Sidorejo, Kota Salatiga, Jawa Tengah 50715
              </p>
            </div>
          </div>
          <div class="contact-info-item">
            <div class="contact-icon">
              <i class="bi bi-telephone-fill" style="font-size: 1.5rem; color: var(--primary);"></i>
            </div>
            <div class="contact-text">
              <h4>Telepon</h4>
              <p>08112519593</p>
            </div>
          </div>
          <div class="contact-info-item">
            <div class="contact-icon">
              <i class="bi bi-envelope-fill" style="font-size: 1.5rem; color: var(--primary);"></i>
            </div>
            <div class="contact-text">
              <h4>Email</h4>
              <p>marketingjkop@jkop.id</p>
            </div>
          </div>
        </div>
      </div>
      <div class="contact-map-wrapper">
        <div class="contact-map-placeholder" style="width: 100%;">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5126330912954!2d110.49177480000002!3d-7.2961548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a78747be49195%3A0x5d37b44073f7cb1b!2sFakultas%20Teknologi%20Informasi%20Universitas%20Kristen%20Satya%20Wacana!5e0!3m2!1sid!2sid!4v1784012379980!5m2!1sid!2sid" width="100%" height="250" style="border:0; border-radius: 16px; margin-bottom: 24px;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
        <div class="contact-form-card">
          <h3 class="form-title">Kirim Pesan</h3>
          <form class="contact-form">
            <div class="form-row">
              <div class="input-group">
                <input type="text" placeholder="Nama Anda" class="form-input" />
              </div>
              <div class="input-group">
                <input
                  type="email"
                  placeholder="Email Anda"
                  class="form-input"
                />
              </div>
            </div>
            <div class="input-group">
              <input type="text" placeholder="Subjek" class="form-input" />
            </div>
            <div class="input-group">
              <textarea
                placeholder="Pesan Anda"
                class="form-textarea"
                rows="4"
              ></textarea>
            </div>
            <button type="submit" class="btn btn-submit">
              <span>Kirim Pesan</span>
              <i class="bi bi-send-fill" style="color: white; margin-left: 8px;"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<footer id="footer" class="site-footer">
  <div class="footer-top-border"></div>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-about">
        <div class="footer-logo">
          <img
            src="{{ asset('assets/img/logo.png') }}"
            alt="JKOP.ID Logo"
            style="width: 28px; height: 28px;"
          />
          <span class="logo-text">JKOP.ID</span>
        </div>
        <p class="footer-description">
          Sistem informasi koperasi terintegrasi & transparan
        </p>
        <div class="footer-contact-info">
          <div class="footer-contact-item">
            <i class="bi bi-geo-alt" style="color: var(--primary); margin-right: 8px;"></i>
            <span>Jl. Dr. O. Notohamidjojo No.1 - 10, Blotongan, Kec. Sidorejo, Kota Salatiga, Jawa Tengah</span>
          </div>
          <div class="footer-contact-item">
            <i class="bi bi-telephone" style="color: var(--primary); margin-right: 8px;"></i>
            <span>08112519593</span>
          </div>
          <div class="footer-contact-item">
            <i class="bi bi-envelope" style="color: var(--primary); margin-right: 8px;"></i>
            <span>marketingjkop@jkop.id</span>
          </div>
        </div>
      </div>

      <div class="footer-links">
        <div class="footer-widget-title">
          <h4>Menu</h4>
          <div class="title-underline"></div>
        </div>
        <ul class="footer-menu">
          <li><a href="home">Beranda</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#features">Solusi</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </div>

      <div class="footer-links">
        <div class="footer-widget-title">
          <h4>Layanan</h4>
          <div class="title-underline"></div>
        </div>
        <ul class="footer-menu">
          <li><a href="register">Daftar Segera</a></li>
          <li><a href="blog">Blog</a></li>
          <li><a href="privacy-policy">Kebijakan Privasi</a></li>
        </ul>
      </div>

      <div class="footer-social-section">
        <div class="footer-widget-title">
          <h4>Ikuti Kami</h4>
          <div class="title-underline"></div>
        </div>
        <div class="footer-social-links">
          <a href="#" class="social-icon"><i class="bi bi-facebook" style="font-size: 1.2rem;"></i></a>
          <a href="#" class="social-icon"><i class="bi bi-instagram" style="font-size: 1.2rem;"></i></a>
          <a href="#" class="social-icon"><i class="bi bi-twitter-x" style="font-size: 1.2rem;"></i></a>
          <a href="#" class="social-icon"><i class="bi bi-linkedin" style="font-size: 1.2rem;"></i></a>
        </div>
      </div>
    </div>

    <div class="footer-bottom"> 
      <p>© 2026 JKOP.ID — All Rights Reserved.</p>
    </div>
  </div>
</footer>

@endsection