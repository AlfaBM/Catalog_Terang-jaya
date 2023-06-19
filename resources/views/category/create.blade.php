@extends('layout.admin-layout')
@section('title', 'Categories')

@section('category')

@if (Session::has('succes'))
<div class="alert alert-success" role="alert">
    {{ Session::get('succes') }}
</div>
@endif
<div class=" col-6 m-auto mt-3">
    <form action="{{ Route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p class="mb-3 text-start" style="opacity: .3;">Catatan: semua kolom wajib diisi</p>
        <div class="mb-3 text-start">
            <label for="name">Nama Kategori</label>
            <input class="form-control " type="text" name="name" id="name" required autocomplete="off">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">SUBMIT</button>
            <a class="btn btn-outline-danger" type="button" href="{{ route('category.index') }}">BACK</a>
        </div>
    </form>
</div>

@endsection