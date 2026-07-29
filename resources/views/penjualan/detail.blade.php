@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')


<style>

body{

    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f5ddd5 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);

    min-height:100vh;

}




.container{

    padding-top:30px;

}




/* TITLE */

.page-title{

    color:#7a4f44;

    font-size:38px;

    font-weight:800;

}





/* DETAIL CARD */


.detail-card{

    background:white;

    border-radius:35px;

    padding:30px;

    margin-bottom:30px;


    box-shadow:

    15px 15px 35px rgba(180,120,120,.18),

    -10px -10px 20px white;

}




.info-box{

    background:

    linear-gradient(
        135deg,
        #fff0eb,
        #f8d7d0
    );

    border-radius:20px;

    padding:15px 20px;

    margin-bottom:15px;

    color:#7a4f44;

    font-weight:600;

}




.total-box{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    color:white;

    border-radius:25px;

    padding:20px;

    font-size:20px;

    font-weight:700;

}





/* TABLE */


.table-card{

    background:white;

    border-radius:35px;

    padding:25px;


    box-shadow:

    15px 15px 35px rgba(180,120,120,.15);

}



.table{

    border-collapse:separate;

    border-spacing:0 15px;

}



.table thead th{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    color:white;

    padding:18px;

    border:none;

}



.table thead th:first-child{

    border-radius:20px 0 0 20px;

}



.table thead th:last-child{

    border-radius:0 20px 20px 0;

}




.table tbody tr{

    background:#fff8f5;

    box-shadow:

    5px 5px 15px rgba(180,120,120,.12);

}



.table td,
.table th{

    padding:18px;

    vertical-align:middle;

    border:none;

}





.product-image{

    width:90px;

    height:90px;

    object-fit:cover;

    border-radius:25px;

    border:4px solid white;


    box-shadow:

    8px 8px 20px rgba(120,80,70,.2);

}





.name-box{

    background:#f8d7d0;

    color:#7a4f44;

    padding:10px 15px;

    border-radius:20px;

    font-weight:700;

}





.price-box{

    background:#fce9e5;

    color:#c06b5d;

    padding:10px 15px;

    border-radius:20px;

    font-weight:700;

}





</style>





<div class="container">



<h1 class="page-title mb-4">

☕ Detail Coffee Sales

</h1>






<div class="detail-card">


<div class="info-box">

☕ Kasir :

{{ $sale->user->name }}

</div>



<div class="info-box">

📅 Tanggal Transaksi :

{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}

</div>




<div class="total-box">

💰 Total Pembayaran :

Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

</div>



</div>








<div class="table-card">



<table class="table">


<thead>

<tr>

<th>No</th>

<th>Foto</th>

<th>Nama Produk</th>

<th>Harga</th>

</tr>

</thead>




<tbody>


<?php $i = 1; ?>



@foreach($sale->itempenjualan as $item)


<tr>


<th>

{{ $i++ }}

</th>



<td>

<img 

src="{{ asset('storage/' .$item->produk->foto) }}"

class="product-image">

</td>




<td>

<div class="name-box">

☕ {{ $item->produk->nama }}

</div>

</td>




<td>

<div class="price-box">

Rp {{ number_format($item->produk->harga_jual,0,',','.') }}

</div>

</td>



</tr>



@endforeach



</tbody>


</table>



</div>




</div>


@endsection