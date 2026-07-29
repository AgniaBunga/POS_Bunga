@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

@include('layouts.navbar')


<style>

body{

    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f8dfd7 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);

    min-height:100vh;

}



/* CARD DETAIL */

.detail-card{

    max-width:700px;

    margin:40px auto;

    background:white;

    border-radius:35px;

    overflow:hidden;


    box-shadow:

    15px 15px 35px rgba(140,90,70,.18),

    -10px -10px 25px white;

}





/* HEADER */

.detail-header{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );


    padding:30px;

    text-align:center;

    color:white;

}



.detail-header h2{

    font-weight:800;

    margin:0;

}



.detail-header p{

    margin-top:8px;

    opacity:.9;

}





/* FOTO PRODUK */

.image-box{

    padding:35px;

    text-align:center;

    background:#fff8f5;

}



.product-photo{

    width:220px;

    height:220px;

    object-fit:cover;

    border-radius:40px;

    border:6px solid white;


    box-shadow:

    10px 10px 25px rgba(120,80,70,.25);

}





/* BODY */

.detail-body{

    padding:35px;

}





.product-name{

    color:#7a4f44;

    font-size:28px;

    font-weight:800;

    text-align:center;

    margin-bottom:25px;

}





/* INFORMASI */

.info-box{

    background:#fff8f5;

    padding:18px 22px;

    border-radius:22px;

    margin-bottom:15px;


    box-shadow:

    6px 6px 15px rgba(180,120,120,.15),

    -3px -3px 8px white;

}





.info-title{

    color:#b08b85;

    font-size:14px;

}





.info-value{

    color:#c06b5d;

    font-size:18px;

    font-weight:700;

}





/* BUTTON */

.btn-back{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );


    border:none;

    color:white;

    border-radius:18px;

    padding:12px 35px;

    font-weight:600;


    box-shadow:

    8px 8px 15px rgba(180,120,120,.25);

}



.btn-back:hover{

    color:white;

    transform:translateY(-3px);

}



</style>





<div class="detail-card">



    <div class="detail-header">


        <h2>
            ☕ Detail Produk
        </h2>


        <p>
            Informasi menu Coffee Bloom
        </p>


    </div>





    <div class="image-box">


        <img 
        src="{{ asset('storage/' . $produk->foto) }}" 
        class="product-photo"
        alt="Foto Produk">


    </div>






    <div class="detail-body">


        <h3 class="product-name">

            {{ $produk->nama }}

        </h3>





        <div class="info-box">


            <div class="info-title">

                Harga Dasar

            </div>


            <div class="info-value">

                Rp {{ number_format($produk->harga_beli,0,',','.') }}

            </div>


        </div>






        <div class="info-box">


            <div class="info-title">

                Harga Jual

            </div>


            <div class="info-value">

                Rp {{ number_format($produk->harga_jual,0,',','.') }}

            </div>


        </div>







        <div class="info-box">


            <div class="info-title">

                Stok Produk

            </div>


            <div class="info-value">

                {{ $produk->stok }}

            </div>


        </div>







        <div class="info-box">


            <div class="info-title">

                Nama Penginput

            </div>


            <div class="info-value">

                {{ $produk->user->name }}

            </div>


        </div>







        <div class="text-center mt-4">


            <a href="{{ route('produk.index') }}"
               class="btn btn-back">


                ← Kembali


            </a>


        </div>





    </div>


</div>




@endsection