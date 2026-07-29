@extends('layouts.app')

@section('title','Edit Produk')

@section('content')

@include('layouts.navbar')

<style>

body{
    background:
    radial-gradient(circle at top left,#fff0eb 0%,transparent 35%),
    radial-gradient(circle at bottom right,#f5d8cc 0%,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);

    min-height:100vh;
}



/* CARD */

.edit-container{
    max-width:850px;
    margin:40px auto;
}


.edit-card{

    background:white;

    border-radius:30px;

    overflow:hidden;

    border:none;

    box-shadow:

    15px 15px 35px rgba(140,90,70,.18),

    -10px -10px 25px rgba(255,255,255,.9);

}





/* HEADER */

.edit-header{

    background:

    linear-gradient(
        135deg,
        #b97868,
        #e8beb8
    );

    color:white;

    padding:30px;

    text-align:center;

}


.edit-header h2{

    font-weight:800;

    margin:0;

}


.edit-header p{

    margin-top:8px;

    opacity:.9;

}





/* BODY */

.edit-body{

    padding:35px;

}





/* FORM */

.form-control,
.form-select{

    border-radius:18px;

    border:2px solid #f2ddd7;

    padding:12px;

}


.form-control:focus,
.form-select:focus{

    border-color:#c79288;

    box-shadow:

    0 0 12px rgba(199,146,136,.25);

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

    padding:12px 28px;

    border-radius:18px;

    font-weight:600;


    box-shadow:

    8px 8px 18px rgba(180,120,120,.25);

}



.btn-save:hover{

    color:white;

    transform:translateY(-3px);

}



.btn-back{

    border-radius:18px;

    padding:12px 28px;

}







/* ERROR */

.alert{

    border-radius:20px;

}



</style>




<div class="container edit-container">


<div class="edit-card">



    <div class="edit-header">

        <h2>
            ☕ Edit Menu Coffee Bloom
        </h2>

        <p>
            Perbarui informasi produk yang tersedia
        </p>

    </div>





    <div class="edit-body">



        @if ($errors->any())

        <div class="alert alert-danger">


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





        <form action="{{ route('produk.update', $produk) }}"
              method="POST"
              enctype="multipart/form-data">


            @csrf

            @method('PUT')



            @include('produk._form')





            <div class="mt-4 d-flex gap-3">


                <button type="submit"
                        class="btn btn-save">

                    ☕ Simpan Perubahan

                </button>



                <a href="{{ route('produk.index') }}"
                   class="btn btn-outline-secondary btn-back">

                    ← Kembali

                </a>


            </div>



        </form>



    </div>



</div>


</div>


@endsection