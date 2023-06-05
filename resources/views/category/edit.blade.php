@extends('layout.admin-layout')
@section('title', 'Categories')

@section('category')

<div class="col-6 m-auto mt-3">
    <form action="{{ Route('category.update', $category['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 text-start">
            <label for="name">Nama Kategori</label>
            <input class="form-control " type="text" name="name" id="name" value="$category['nama']" required autocomplete="off">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">SUBMIT</button>
            <a class="btn btn-outline-danger" type="button" href="{{ route('Catalog.admin.index') }}">BACK</a>
        </div>
    </form>
</div>
@endsection