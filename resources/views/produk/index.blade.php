@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')


<style>

body{
    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f9e0d8 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);
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




/* BUTTON */

.btn-create{

    background:linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    border:none;
    color:white;
    border-radius:20px;
    padding:13px 25px;
    font-weight:600;

    box-shadow:
    8px 8px 15px rgba(180,120,120,.2);

}



.btn-create:hover{

    transform:translateY(-4px);
    color:white;

}





/* SEARCH */

.search-card{

    background:white;

    padding:25px;

    border-radius:30px;

    box-shadow:

    12px 12px 30px rgba(180,120,120,.15);

    margin-bottom:30px;

}



.search-input{

    border-radius:20px;

    border:2px solid #f1ddd7;

    padding:14px;

}




.btn-search{

    background:#c79288;

    color:white;

    border:none;

    border-radius:20px;

}




/* PRODUCT CARD */


.product-card{

    border:none;

    border-radius:35px;

    overflow:hidden;

    height:100%;


    background:white;


    box-shadow:

    15px 15px 35px rgba(180,120,120,.15),

    -10px -10px 20px white;


    transition:.35s;


}



.product-card:hover{

    transform:

    translateY(-10px)
    scale(1.03);


}





/* COLOR CARD */

.product-top{

    height:150px;

    display:flex;

    justify-content:center;

    align-items:center;

}



.color-one{

    background:linear-gradient(
        135deg,
        #f8d7d0,
        #fff0eb
    );

}


.color-two{

    background:linear-gradient(
        135deg,
        #ead5c7,
        #fff8f2
    );

}


.color-three{

    background:linear-gradient(
        135deg,
        #e8beb8,
        #fce9e5
    );

}


.color-four{

    background:linear-gradient(
        135deg,
        #d9c2b8,
        #fff5ef
    );

}



.product-image{

    width:120px;

    height:120px;

    object-fit:cover;

    border-radius:35px;

    border:5px solid white;


    box-shadow:

    8px 8px 20px rgba(120,80,70,.2);

}





.product-body{

    padding:25px;

}




.product-name{

    color:#7a4f44;

    font-size:22px;

    font-weight:700;

}





.price{

    color:#c06b5d;

    font-size:18px;

    font-weight:700;

}





.stock{

    background:#f5ddd7;

    color:#7a4f44;

    padding:8px 15px;

    border-radius:20px;

    font-weight:600;

}




.action-btn{

    border-radius:15px;

    border:none;

    padding:8px 15px;

    font-size:13px;

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




.empty-state{

    background:white;

    border-radius:30px;

    padding:50px;

    text-align:center;

    color:#b08b85;

}



</style>




<div class="container">



<div class="page-header">


<div>

<div class="page-title">

☕ Coffee Menu

</div>


<div class="page-subtitle">

Kelola seluruh produk Coffee Bloom

</div>


</div>




@can('create', App\Models\Produk::class)

<a href="{{ route('produk.create') }}"
class="btn btn-create">

☕ Tambah Produk

</a>

@endcan



</div>






<div class="search-card">


<form action="{{ route('produk.index') }}" method="GET">


<div class="input-group">


<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control search-input"

placeholder="Cari menu coffee...">



<button class="btn btn-search px-4">

Cari

</button>



</div>


</form>


</div>





<div class="row g-4">



@forelse ($products as $product)


<div class="col-lg-4 col-md-6">


<div class="product-card">



<div class="product-top 
{{ $loop->index % 4 == 0 ? 'color-one' : '' }}
{{ $loop->index % 4 == 1 ? 'color-two' : '' }}
{{ $loop->index % 4 == 2 ? 'color-three' : '' }}
{{ $loop->index % 4 == 3 ? 'color-four' : '' }}">



<img

src="{{ asset('storage/'.$product->foto) }}"

class="product-image">


</div>





<div class="product-body">


<div class="product-name">

{{ $product->nama }}

</div>



<p class="text-muted">

{{ $product->user->name }}

</p>



<p>

Harga Beli :

<br>

Rp {{ number_format($product->harga_beli,0,',','.') }}

</p>




<p class="price">

Harga Jual :

<br>

Rp {{ number_format($product->harga_jual,0,',','.') }}

</p>




<span class="stock">

Stok : {{ $product->stok }}

</span>




<div class="mt-4 d-flex gap-2 flex-wrap">



<a href="{{ route('produk.show',$product) }}"

class="btn btn-detail action-btn">

Detail

</a>





@can('update',$product)

<a href="{{ route('produk.edit',$product) }}"

class="btn btn-edit action-btn">

Edit

</a>

@endcan





@can('delete',$product)

<form action="{{ route('produk.destroy',$product) }}"

method="POST">


@csrf

@method('DELETE')



<button

class="btn btn-delete action-btn"

onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

Hapus

</button>



</form>

@endcan



</div>


</div>


</div>


</div>



@empty


<div class="col-12">

<div class="empty-state">


<h4>

☕ Data Produk Kosong

</h4>


<p>

Belum ada menu yang tersedia.

</p>


</div>


</div>


@endforelse



</div>




<div class="mt-4">

{{ $products->links() }}

</div>




</div>


@endsection