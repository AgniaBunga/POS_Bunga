@extends('layouts.app')

@section('title', 'Tentang Saya')

@section('content')

@include('layouts.navbar')

<style>

body{
    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f9e0d8 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);
    min-height:100vh;
}

.about-container{
    max-width:1100px;
    margin:50px auto;
    padding:20px;
}

.about-card{
    background:white;
    border-radius:35px;
    overflow:hidden;

    box-shadow:
    15px 15px 35px rgba(180,120,120,.15),
    -10px -10px 25px white;
}

.profile-section{
    background:
    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    padding:45px;

    display:flex;
    flex-wrap:wrap;
    align-items:center;
    gap:35px;
}

.profile-img{
    width:200px;
    height:200px;
    object-fit:cover;
    border-radius:50%;

    border:6px solid white;

    box-shadow:
    10px 10px 25px rgba(0,0,0,.15);
}

.profile-info h1{
    color:white;
    font-size:42px;
    font-weight:800;
    margin-bottom:10px;
}

.profile-info p{
    color:#fff8f5;
    font-size:16px;
    line-height:1.8;
    max-width:600px;
}

.profile-tags{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-top:15px;
}

.tag{
    background:rgba(255,255,255,.25);
    color:white;
    padding:10px 18px;
    border-radius:20px;
    font-size:14px;
    font-weight:600;
    backdrop-filter:blur(5px);
}

.about-body{
    padding:40px;
}

.section-title{
    color:#7a4f44;
    font-weight:800;
    margin-bottom:15px;

    border-left:5px solid #c79288;
    padding-left:12px;
}

.info-box{
    background:#fff8f5;

    border-radius:25px;

    padding:25px;

    margin-bottom:20px;

    transition:.3s;

    box-shadow:
    8px 8px 20px rgba(180,120,120,.12);
}

.info-box:hover{
    transform:translateY(-5px);
}

.info-box p{
    color:#8a6a5b;
    line-height:1.8;
    margin-bottom:0;
}

.tech-list{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
    gap:15px;
}

.tech-item{
    background:white;

    padding:18px;

    border-radius:18px;

    text-align:center;

    font-weight:700;

    color:#7a4f44;

    box-shadow:
    5px 5px 12px rgba(180,120,120,.12);

    transition:.3s;
}

.tech-item:hover{
    transform:translateY(-3px);
}

.info-table p{
    margin-bottom:10px;
    color:#8a6a5b;
}

.info-table strong{
    color:#7a4f44;
}

</style>

<div class="about-container">

    <div class="about-card">

        <div class="profile-section">

            <img
                src="{{ asset('/storage/images/foto bunga.jpeg') }}"
                alt="Bunga Arum"
                class="profile-img"
            >

            <div class="profile-info">

                <h1>Bunga arum dani</h1>

                <p>
                    Saya merupakan siswi jurusan Pengembangan Perangkat Lunak dan Gim
                    yang memiliki minat pada bidang pengembangan aplikasi berbasis web.
                    Proyek ini dibuat sebagai implementasi pembelajaran pemrograman
                    menggunakan Laravel untuk membangun sistem Point Of Sale yang
                    modern, terstruktur, dan mudah digunakan.
                </p>

                <div class="profile-tags">
                    <span class="tag">Laravel</span>
                    <span class="tag">PHP</span>
                    <span class="tag">MySQL</span>
                    <span class="tag">Coffee Bloom POS</span>
                </div>

            </div>

        </div>

        <div class="about-body">

            <div class="info-box">

                <h3 class="section-title">
                    Tentang Aplikasi
                </h3>

                <p>
                    Coffee Bloom POS merupakan aplikasi Point Of Sale yang
                    dirancang untuk membantu proses operasional coffee shop.
                    Sistem ini menyediakan fitur pengelolaan produk, transaksi
                    penjualan, manajemen pengguna, pencarian data, serta
                    monitoring stok sehingga aktivitas bisnis dapat berjalan
                    lebih cepat, terorganisir, dan efisien.
                </p>

            </div>

            <div class="info-box">

                <h3 class="section-title">
                    Framework
                </h3>

                <p>
                    Aplikasi dibangun menggunakan Laravel yang menerapkan
                    arsitektur MVC (Model View Controller). Dengan pendekatan
                    tersebut, struktur kode menjadi lebih rapi, mudah
                    dikembangkan, serta memudahkan proses pemeliharaan sistem.
                </p>

            </div>

            <div class="info-box">

                <h3 class="section-title">
                    Bahasa Pemrograman & Teknologi
                </h3>

                <div class="tech-list">

                    <div class="tech-item">PHP</div>
                    <div class="tech-item">Laravel</div>
                    <div class="tech-item">HTML</div>
                    <div class="tech-item">CSS</div>
                    <div class="tech-item">JavaScript</div>
                    <div class="tech-item">MySQL</div>
                    <div class="tech-item">Bootstrap</div>
                    <div class="tech-item">Blade Template</div>

                </div>

            </div>

            <div class="info-box">

                <h3 class="section-title">
                    Fitur Utama
                </h3>

                <p>
                    Sistem menyediakan berbagai fitur seperti pengelolaan data
                    produk, manajemen pengguna, transaksi penjualan, pencarian
                    data, monitoring stok produk, serta dashboard yang
                    menampilkan ringkasan informasi penjualan dan kondisi
                    inventaris.
                </p>

            </div>

            <div class="info-box">

                <h3 class="section-title">
                    Tujuan Pembuatan
                </h3>

                <p>
                    Aplikasi ini dibuat untuk menerapkan kemampuan yang telah
                    dipelajari pada jurusan PPLG serta memberikan solusi digital
                    dalam pengelolaan transaksi pada coffee shop agar lebih
                    efektif, akurat, dan mudah digunakan.
                </p>

            </div>

            <div class="info-box">

                <h3 class="section-title">
                    Informasi Pengembang
                </h3>

                <div class="info-table">

                    <p>
                        <strong>Nama :</strong>
                        Bunga arum dani
                    </p>

                    <p>
                        <strong>Kelas :</strong>
                        XII PPLG 1
                    </p>

                    <p>
                        <strong>Sekolah :</strong>
                        SMKN 4 Tasikmalaya
                    </p>

                    <p>
                        <strong>Project :</strong>
                        Coffee Bloom POS System
                    </p>

                    <p>
                        <strong>Framework :</strong>
                        Laravel
                    </p>

                    <p>
                        <strong>Database :</strong>
                        MySQL
                    </p>

                    <p>
                        <strong>Bahasa Pemrograman :</strong>
                        PHP, HTML, CSS, JavaScript
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection