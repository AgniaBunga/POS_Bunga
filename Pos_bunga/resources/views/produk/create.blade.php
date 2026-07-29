@extends('layouts.app')

@section('title','Edit Produk')

@section('content')
<h4>Edit Produk</h4>

<form action="{{ route('produk.store') }}"
        method="POST"
        enctype="multipart/form-data">
@include('produk._form')
</form>
@endsection