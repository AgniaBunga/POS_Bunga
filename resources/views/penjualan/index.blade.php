@extends('layouts.app')

@section('title', 'Penjualan')

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



/* HEADER */

.page-header{

    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;

}


.page-title{

    font-size:40px;
    font-weight:800;
    color:#7a4f44;

}


.page-subtitle{

    color:#b08b85;

}





/* BUTTON CREATE */

.btn-create{

    background:linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    color:white;

    border:none;

    border-radius:20px;

    padding:13px 25px;

    font-weight:600;

    box-shadow:
    8px 8px 15px rgba(180,120,120,.25);

}


.btn-create:hover{

    color:white;

    transform:translateY(-4px);

}





/* SEARCH */

.search-card{

    background:white;

    padding:25px;

    border-radius:30px;

    margin-bottom:30px;

    box-shadow:

    12px 12px 30px rgba(180,120,120,.15);

}



.search-input{

    border-radius:20px;

    border:2px solid #f1ddd7;

    padding:13px;

}



.btn-search{

    background:#c79288;

    color:white;

    border:none;

    border-radius:20px;

}





/* TABLE BOX */


.table-card{

    background:white;

    border-radius:35px;

    padding:25px;


    box-shadow:

    15px 15px 35px rgba(180,120,120,.18),

    -10px -10px 20px white;

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

    background:white;

    box-shadow:

    8px 8px 20px rgba(180,120,120,.12);

    transition:.3s;

}



.table tbody tr:hover{

    transform:translateY(-5px);

}




.table td{

    padding:18px;

    border:none;

    vertical-align:middle;

}





/* DATA BOX */


.data-box{

    background:#fff8f5;

    padding:10px 15px;

    border-radius:18px;

    display:inline-block;

    color:#7a4f44;

    font-weight:600;

}





/* KASIR */


.cashier-box{

    background:

    linear-gradient(
        135deg,
        #f8d7d0,
        #fff0eb
    );

    padding:10px 18px;

    border-radius:20px;

    color:#7a4f44;

    font-weight:700;

}





/* HARGA */


.price-box{

    background:#fce9e5;

    color:#c06b5d;

    padding:10px 15px;

    border-radius:20px;

    font-weight:700;

}





/* STATUS */


.status-box{

    background:

    linear-gradient(
        135deg,
        #e8beb8,
        #f8d7d0
    );

    color:#7a4f44;

    padding:9px 18px;

    border-radius:20px;

    font-weight:700;

}





/* ACTION BUTTON */


.action-btn{

    border-radius:15px;

    border:none;

    padding:8px 15px;

}



.btn-detail{

    background:#d9a299;

    color:white;

}



.btn-edit{

    background:#f2c879;

}



.btn-delete{

    background:#df8178;

    color:white;

}



</style>





<div class="container">


@if(session('errors'))

<div class="alert alert-danger rounded-4">

{{ session('errors') }}

</div>

@endif




<div class="page-header">


<div>

<h1 class="page-title">

☕ Coffee Sales

</h1>


<p class="page-subtitle">

Kelola transaksi Coffee Bloom

</p>


</div>



<a href="{{ route('penjualan.create') }}"

class="btn btn-create">

☕ Tambah Penjualan

</a>


</div>







<div class="search-card">


<form action="{{ route('penjualan.index') }}" method="GET">


<div class="input-group">


<input

type="text"

name="search"

value="{{ request()->search }}"

class="form-control search-input"

placeholder="Cari transaksi coffee...">



<button class="btn btn-search px-4">

Search

</button>



</div>


</form>


</div>








<div class="table-card">


<table class="table">


<thead>

<tr>

<th>No</th>

<th>Tanggal</th>

<th>Kasir</th>

<th>Total Pembayaran</th>

<th>Metode</th>

<th>Status</th>

<th>Aksi</th>


</tr>

</thead>




<tbody>


@forelse($sales as $sale)


<tr>


<td>

<div class="data-box">

{{ $sales->firstItem() + $loop->index }}

</div>

</td>



<td>

<div class="data-box">

{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}

</div>

</td>




<td>

<div class="cashier-box">

☕ {{ $sale->user->name }}

</div>

</td>




<td>

<div class="price-box">

Rp {{ number_format($sale->total_pembayaran,0,',','.') }}

</div>

</td>




<td>

<div class="data-box">

{{ $sale->metode_pembayaran }}

</div>

</td>




<td>

<span class="status-box">

{{ $sale->status }}

</span>

</td>




<td>


<div class="d-flex gap-2 flex-wrap">



<a href="{{ route('penjualan.show',$sale) }}"

class="btn btn-detail action-btn">

☕ Detail

</a>




@can('view',$sale)

<a href="{{ route('penjualan.edit',$sale) }}"

class="btn btn-edit action-btn">

✏ Edit

</a>

@endcan





@can('delete',$sale)

<form action="{{ route('penjualan.destroy',$sale) }}"

method="POST">


@csrf

@method('DELETE')



<button

class="btn btn-delete action-btn"

onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">

🗑 Hapus

</button>


</form>


@endcan



</div>


</td>



</tr>




@empty


<tr>

<td colspan="7" class="text-center py-4">

☕ Belum ada transaksi Coffee Bloom

</td>

</tr>


@endforelse



</tbody>


</table>



<div class="mt-4">

{{ $sales->links() }}

</div>



</div>


</div>


@endsection