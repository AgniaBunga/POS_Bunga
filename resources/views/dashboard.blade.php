@extends('layouts.app')

@section('title', 'Dashboard Coffee Bloom')

@section('content')

@include('layouts.navbar')


<style>

body{
    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f8dfd7 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);
}


/* CONTAINER */

.container{
    padding-top:35px;
    padding-bottom:50px;
}



/* HEADER */

.dashboard-title{

    font-size:45px;
    font-weight:800;
    color:#7a4f44;

}


.dashboard-subtitle{

    color:#b08b85;

}



/* CARD */

.dashboard-card{

    background:white;

    border-radius:30px;

    border:none;

    overflow:hidden;

    box-shadow:

    12px 12px 30px rgba(150,100,80,.15),

    -8px -8px 20px white;

    transition:.3s;

}


.dashboard-card:hover{

    transform:translateY(-8px);

}




.card-header{

    background:

    linear-gradient(
    135deg,
    #c79288,
    #e8beb8
    );

    color:white;

    padding:18px;

    font-weight:700;

    text-align:center;

}




.card-body{

    padding:35px;

    text-align:center;

}



.card-number{

    color:#7a4f44;

    font-size:32px;

    font-weight:800;

}



/* TITLE SECTION */

.section-title{

    color:#7a4f44;

    font-weight:700;

    margin:35px 0 20px;

}




/* TABLE */

.table-box{

    background:white;

    border-radius:25px;

    padding:20px;

    box-shadow:

    10px 10px 25px rgba(150,100,80,.12);

}



.table{

    margin-bottom:0;

}



.table thead{

    background:#e8beb8;

    color:white;

}



.table th{

    border:none;

    padding:15px;

}



.table td{

    padding:15px;

}



.table tbody tr:hover{

    background:#fff5f2;

}



/* PAGINATION */

.page-link{

    color:#7a4f44;

}



.page-item.active .page-link{

    background:#c79288;

    border-color:#c79288;

}


</style>





<div class="container">



<div class="text-center mb-5">


<h1 class="dashboard-title">

☕ Coffee Bloom

</h1>


<p class="dashboard-subtitle">

Dashboard Management System

</p>


<small class="text-muted">

{{ $tanggalHariIni->translatedFormat('l, d F Y') }}

</small>


</div>





@can('viewAny', App\Models\User::class)



<h2 class="section-title">

Sales Overview

</h2>



<div class="row g-4">



<div class="col-md-6">


<div class="dashboard-card">


<div class="card-header">

Total Penjualan Hari Ini

</div>


<div class="card-body">


<div class="card-number">

Rp {{ number_format($ringkasan['total_penjualan'],0,',','.') }}

</div>


</div>


</div>


</div>





<div class="col-md-6">


<div class="dashboard-card">


<div class="card-header">

Jumlah Transaksi Hari Ini

</div>


<div class="card-body">


<div class="card-number">

{{ number_format($ringkasan['total_transaksi']) }}

</div>


</div>


</div>


</div>


</div>






<h2 class="section-title">

Payment Summary

</h2>



<div class="row g-4">


<div class="col-md-6">


<div class="dashboard-card">


<div class="card-header">

Pembayaran Tunai

</div>


<div class="card-body">


<div class="card-number">

Rp {{ number_format($ringkasan['total_cash'],0,',','.') }}

</div>


</div>


</div>


</div>





<div class="col-md-6">


<div class="dashboard-card">


<div class="card-header">

Pembayaran Non Tunai

</div>


<div class="card-body">


<div class="card-number">

Rp {{ number_format($ringkasan['total_non_tunai'],0,',','.') }}

</div>


</div>


</div>


</div>



</div>



@endcan







<h2 class="section-title">

Inventory Status

</h2>




<div class="row g-4">


<div class="col-md-6">


<div class="table-box">


<h5 class="mb-3" style="color:#7a4f44">

Produk Stok Rendah

</h5>


<table class="table">


<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Stok</th>

</tr>

</thead>



<tbody>


@forelse($produkStokRendah as $index=>$produk)


<tr>

<td>
{{ $produkStokRendah->firstItem()+$index }}
</td>


<td>
{{ $produk->nama }}
</td>


<td>
{{ $produk->stok }}
</td>


</tr>


@empty

<tr>

<td colspan="3" class="text-center">

Stok produk aman

</td>

</tr>


@endforelse


</tbody>


</table>


{{ $produkStokRendah->links() }}


</div>


</div>






<div class="col-md-6">


<div class="table-box">


<h5 class="mb-3" style="color:#7a4f44">

Produk Habis Stok

</h5>


<table class="table">


<thead>

<tr>

<th>No</th>

<th>Nama</th>

<th>Stok</th>

</tr>

</thead>



<tbody>


@forelse($produkStokHabis as $index=>$produk)


<tr>

<td>

{{ $produkStokHabis->firstItem()+$index }}

</td>


<td>

{{ $produk->nama }}

</td>


<td>

{{ $produk->stok }}

</td>


</tr>


@empty


<tr>

<td colspan="3" class="text-center">

Tidak ada produk habis

</td>

</tr>


@endforelse


</tbody>


</table>


{{ $produkStokHabis->links() }}


</div>


</div>



</div>






<h2 class="section-title">

Best Seller Products

</h2>



<div class="table-box">


<table class="table">


<thead>

<tr>

<th>Nama Produk</th>

<th>Stok</th>

<th>Total Terjual</th>

</tr>

</thead>



<tbody>


@forelse($produkTerlaris as $produk)


<tr>

<td>

{{ $produk->nama }}

</td>


<td>

{{ $produk->stok }}

</td>


<td>

{{ $produk->total_terjual }}

</td>


</tr>


@empty


<tr>

<td colspan="3" class="text-center">

Belum ada data penjualan

</td>

</tr>


@endforelse


</tbody>


</table>


</div>




</div>


@endsection