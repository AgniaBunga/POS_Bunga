@extends('layouts.app')

@section('title', 'Users Coffee Bloom')

@section('content')

@include('layouts.navbar')


<style>

body{
    background:
    radial-gradient(circle at top left,#fff0eb,transparent 35%),
    radial-gradient(circle at bottom right,#f8dfd7,transparent 35%),
    linear-gradient(135deg,#fff8f5,#fdf1ee);

    min-height:100vh;
}


.container{
    padding-top:35px;
    padding-bottom:50px;
}


/* HEADER */

.user-title{
    font-size:40px;
    font-weight:800;
    color:#7a4f44;
}


.user-subtitle{
    color:#b08b85;
}





/* BUTTON CREATE */

.btn-create{

    background:
    linear-gradient(
        135deg,
        #c79288,
        #e8beb8
    );

    color:white;

    border:none;

    border-radius:20px;

    padding:12px 25px;

    font-weight:600;


    box-shadow:
    8px 8px 18px rgba(180,120,120,.2);

}


.btn-create:hover{

    color:white;

    transform:translateY(-3px);

}





/* SEARCH */

.search-box{

    background:white;

    padding:20px;

    border-radius:30px;


    box-shadow:
    10px 10px 30px rgba(180,120,120,.15);

}



.form-control{

    border-radius:20px;

    border:2px solid #f0d7d2;

    padding:13px;

}



.btn-search{

    background:#c79288;

    color:white;

    border:none;

    border-radius:20px;

    padding:10px 25px;

}





/* TABLE BOX */

.table-box{

    background:white;

    border-radius:35px;

    padding:30px;


    box-shadow:

    18px 18px 40px rgba(180,120,120,.15),

    -10px -10px 25px white;


    overflow:hidden;

}





/* TABLE */

.table{

    margin-bottom:0;

}


.table thead{

    background:

    linear-gradient(
        135deg,
        #b9786d,
        #e8beb8
    );

    color:white;

}



.table th{

    padding:20px;

    border:none;

    text-align:center;

    font-size:15px;

}




.table td{

    padding:20px;

    vertical-align:middle;

    text-align:center;

}




.table tbody tr{

    transition:.3s;

}



.table tbody tr:hover{

    background:#fff1ed;

    transform:scale(1.01);

}





/* NOMOR */

.table td:first-child span{

    background:#fff0eb;

    color:#c06b5d;

    padding:10px 15px;

    border-radius:20px;

    font-weight:700;

}





/* NAMA */

.name-box{

    display:inline-block;

    background:

    linear-gradient(
        135deg,
        #f8d7d0,
        #ffece8
    );


    color:#7a4f44;

    padding:10px 18px;

    border-radius:20px;

    font-weight:700;


    box-shadow:

    5px 5px 12px rgba(180,120,120,.15);

}





/* EMAIL */

.email-box{

    display:inline-block;

    background:

    linear-gradient(
        135deg,
        #ead5c7,
        #fff8f2
    );


    color:#8d6258;

    padding:10px 18px;

    border-radius:20px;

    font-weight:600;


    box-shadow:

    5px 5px 12px rgba(180,120,120,.15);

}





/* ROLE */

.role{

    display:inline-block;

    background:

    linear-gradient(
        135deg,
        #f5ddd7,
        #ffece8
    );


    color:#9b5d52;

    padding:10px 20px;

    border-radius:25px;

    font-weight:700;


    box-shadow:

    5px 5px 12px rgba(180,120,120,.15);

}





/* ACTION */

.action-box{

    background:#fff8f5;

    padding:10px;

    border-radius:20px;

}





.btn-edit{

    background:

    linear-gradient(
        135deg,
        #f6d365,
        #f9a825
    );

    color:white;

    border:none;

    border-radius:15px;

    padding:8px 18px;

    font-weight:600;

}



.btn-delete{

    background:

    linear-gradient(
        135deg,
        #ef9a9a,
        #e57373
    );


    color:white;

    border:none;

    border-radius:15px;

    padding:8px 18px;

    font-weight:600;

}





.page-link{

    color:#7a4f44;

    border:none;

}



.page-item.active .page-link{

    background:#c79288;

    border-color:#c79288;

}


</style>





<div class="container">

    <div class="text-center mb-5">

        <h1 class="user-title">
            ☕ Coffee Bloom Pengguna
        </h1>

        <p class="user-subtitle">
            Manage account and customer access
        </p>

    </div>

    <div class="mb-4">

        <a href="{{ route('admin.users.create') }}"
           class="btn btn-create">

            ☕ Tambah Pengguna

        </a>

    </div>

    <div class="search-box mb-4">

        <form action="{{ route('admin.users') }}" method="GET">

            <div class="input-group">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search username or email...">

                <button type="submit" class="btn btn-search">
                    Cari
                </button>

            </div>

        </form>

    </div>

    <div class="table-box">

        <table class="table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($users as $user)

                <tr>

                    <td>
                        <span>
                            {{ $users->firstItem() + $loop->index }}
                        </span>
                    </td>

                    <td>
                        <div class="name-box">
                            {{ $user->name }}
                        </div>
                    </td>

                    <td>
                        <div class="email-box">
                            {{ $user->email }}
                        </div>
                    </td>

                    <td>
                        <span class="role">
                            {{ $user->role->name }}
                        </span>
                    </td>

                    <td>

                        <div class="action-box">

                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="btn btn-edit">
                                Edit
                            </a>

                            <form
                                action="{{ route('admin.users.destroy', $user) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-delete"
                                    onclick="return confirm('Yakin hapus user ini?')">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>

    </div>

</div>

@endsection