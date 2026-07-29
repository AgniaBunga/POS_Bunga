@extends('layouts.app')

@section('title','Tambah User')

@section('content')

@include('layouts.navbar')


<style>

body{
    background: linear-gradient(
        135deg,
        #fff8f5,
        #fdf1ee,
        #f6e7e1
    );
    min-height:100vh;
}


/* CARD */

.user-card{

    max-width:800px;

    margin:40px auto;

    border:none;

    border-radius:40px;

    overflow:hidden;

    background:white;


    box-shadow:

    18px 18px 40px rgba(180,120,120,.18),

    -10px -10px 25px rgba(255,255,255,.9);


    transition:.3s;

}



.user-card:hover{

    transform:translateY(-8px);

}





/* HEADER */


.user-header{

    background:

    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );


    color:white;

    text-align:center;

    padding:35px;

}



.user-header h3{

    margin:0;

    font-size:30px;

    font-weight:700;

}



.user-header small{

    font-size:14px;

}





/* BODY */


.user-body{

    background:white;

    padding:45px;

}





/* FORM */


.form-control{

    border-radius:18px;

    border:2px solid #f0d7d2;

    padding:12px;

}



.form-control:focus{

    border-color:#c79288;

    box-shadow:

    0 0 10px rgba(199,146,136,.3);

}



label{

    color:#7a4f44;

    font-weight:600;

}





/* ALERT */


.alert{

    border:none;

    border-radius:25px;

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


    font-weight:600;


    border-radius:20px;


    padding:12px 35px;


    box-shadow:

    8px 8px 15px rgba(180,120,120,.2);


    transition:.3s;

}



.btn-save:hover{

    transform:translateY(-4px);

    color:white;

}





.btn-back{

    border-radius:20px;

    padding:12px 30px;

}



</style>




<div class="card user-card">



    <div class="user-header">


        <h3>
            ☕ Tambah User
        </h3>


        <small>
            Tambahkan pengguna baru Coffee Bloom
        </small>


    </div>





    <div class="user-body">



        @if ($errors->any())


            <div class="alert alert-danger">


                <strong>
                    ⚠️ Terjadi Kesalahan:
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






        <form action="{{ route('admin.users.store') }}" method="POST">


            @csrf



            @include('users._form')




            <div class="mt-4 d-flex gap-3">


                <button 
                    type="submit" 
                    class="btn btn-save">

                    ☕ Simpan User

                </button>




                <a href="{{ route('admin.users') }}"
                   class="btn btn-outline-secondary btn-back">


                    ← Kembali

                </a>



            </div>



        </form>



    </div>



</div>



@endsection