@extends('layouts.app')


@section('title', 'Coffee Bloom POS')


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




.container{
    padding-top:50px;
    padding-bottom:50px;
}




/* CARD UTAMA */


.pos-card{


    background:white;


    border-radius:35px;


    padding:45px;




    box-shadow:


    15px 15px 35px rgba(180,120,120,.15),


    -10px -10px 25px white;


}






/* HEADER */


.pos-header{


    text-align:center;


    margin-bottom:35px;


}




.pos-header h1{


    color:#7a4f44;


    font-size:42px;


    font-weight:800;


}




.pos-header p{


    color:#9b7b70;


    font-size:18px;


}










/* SECTION */


.section-box{


    background:#fff8f5;


    border-radius:25px;


    padding:25px;


    margin-top:25px;




    box-shadow:


    8px 8px 20px rgba(180,120,120,.12);


}






.section-title{


    color:#7a4f44;


    font-weight:800;


    margin-bottom:15px;




    border-left:5px solid #c79288;


    padding-left:12px;


}






.section-box p{


    color:#8a6a5b;


    line-height:1.8;


}










/* LIST FITUR */


.feature-list{


    display:grid;


    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));


    gap:15px;


}






.feature-item{


    background:white;


    padding:18px;


    border-radius:20px;


    text-align:center;




    color:#7a4f44;


    font-weight:600;




    box-shadow:


    5px 5px 15px rgba(180,120,120,.1);


    transition:.3s;


}




.feature-item:hover{


    transform:translateY(-5px);


}










/* TEKNOLOGI */


.tech-list{


    display:flex;


    flex-wrap:wrap;


    gap:15px;


}






.tech-item{


    background:


    linear-gradient(


        135deg,


        #c79288,


        #e8beb8


    );




    color:white;


    padding:12px 22px;


    border-radius:20px;


    font-weight:600;


}






</style>






<div class="container">




    <div class="pos-card">




        <div class="pos-header">




            <h1>
                Coffee Bloom POS
            </h1>




            <p>
                Sistem Point Of Sale berbasis web untuk membantu
                proses transaksi dan pengelolaan coffee shop
                menjadi lebih cepat, mudah, dan terorganisir.
            </p>




        </div>








        <div class="section-box">




            <h3 class="section-title">
                Deskripsi
            </h3>




            <p>
                Toko kopi (atau coffee shop / kedai kopi) adalah tempat usaha komersial yang berfokus menyajikan berbagai jenis minuman olahan kopi, minuman non-kopi
            </p>




        </div>










        <div class="section-box">




            <h3 class="section-title">
                Fitur Utama
            </h3>






            <div class="feature-list">




                <div class="feature-item">
                    Manajemen Produk
                </div>




                <div class="feature-item">
                    Manajemen Pengguna
                </div>




                <div class="feature-item">
                    Transaksi Penjualan
                </div>




                <div class="feature-item">
                    Pencarian Data
                </div>




                <div class="feature-item">
                    Laporan Penjualan
                </div>




                <div class="feature-item">
                    Monitoring Stok
                </div>




            </div>




        </div>










        <div class="section-box">




            <h3 class="section-title">
                Teknologi yang Digunakan
            </h3>






            <div class="tech-list">




                <span class="tech-item">
                    Laravel 12
                </span>




                <span class="tech-item">
                    PHP
                </span>




                <span class="tech-item">
                    MySQL
                </span>




                <span class="tech-item">
                    Bootstrap
                </span>




                <span class="tech-item">
                    HTML
                </span>




                <span class="tech-item">
                    CSS
                </span>




                <span class="tech-item">
                    JavaScript
                </span>




            </div>




        </div>






    </div>




</div>




@endsection
