@extends('layouts.app')

@section('title', 'Tambah Produk')

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



.create-container{

    max-width:800px;

    margin:40px auto;

}





/* CARD */

.create-card{

    background:white;

    border-radius:35px;

    overflow:hidden;

    border:none;


    box-shadow:

    15px 15px 35px rgba(130,90,70,.18),

    -10px -10px 25px white;

}





/* HEADER */

.page-header{

    background:

    linear-gradient(
        135deg,
        #b77b6f,
        #e8beb8
    );


    padding:30px;

    text-align:center;

    color:white;

}



.page-header h2{

    margin:0;

    font-weight:800;

}



.page-header p{

    margin-top:8px;

    opacity:.9;

}





/* BODY */

.create-body{

    padding:35px;

}





/* INPUT */

.form-control,

.form-select{

    border-radius:18px;

    border:2px solid #f1ddd7;

    padding:12px;

}



.form-control:focus,

.form-select:focus{

    border-color:#c79288;

    box-shadow:

    0 0 10px rgba(199,146,136,.35);

}





/* BUTTON */

.btn-save{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );


    border:none;

    color:white;

    border-radius:18px;

    padding:12px 30px;

    font-weight:700;


    box-shadow:

    8px 8px 15px rgba(180,120,120,.25);

}



.btn-save:hover{

    color:white;

    transform:translateY(-3px);

}



.btn-back{

    border-radius:18px;

    padding:12px 30px;

}



</style>





<div class="container create-container">


    <div class="create-card">



        <div class="page-header">


            <h2>
                ☕ Tambah Produk
            </h2>


            <p>
                Tambahkan menu baru Coffee Bloom
            </p>


        </div>





        <div class="create-body">



            @if ($errors->any())

            <div class="alert alert-danger rounded-4">


                <strong>
                    ⚠️ Terjadi Kesalahan
                </strong>


                <ul class="mb-0 mt-2">

                    @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                    @endforeach

                </ul>


            </div>

            @endif






            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">


                @csrf



                @include('produk._form')





                <div class="mt-4 d-flex gap-2">


                    <button type="submit"
                            class="btn btn-save">


                        ☕ Simpan Produk


                    </button>





                    <a href="{{ route('produk.index') }}"
                       class="btn btn-outline-secondary btn-back">


                        ↩ Kembali


                    </a>



                </div>



            </form>



        </div>


    </div>


</div>


@endsection