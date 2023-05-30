@extends('layout.admin-layout')
@section('title', 'Admin')

@section('content')

    @if (Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes') }}
        </div>
    @endif
    <div class=" col-6 m-auto">
        <form action="{{ Route('Catalog.admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="mb-3 text-start" style="opacity: .3;">Catatan: semua kolom wajib diisi</p>
            <div class="mb-3 text-start">
                <label for="nama">Nama Produk</label>
                <input class="form-control " type="text" name="nama" id="nama" required autocomplete="off">
            </div>
            <div class="mb-3 text-start">
                <label for="deskripsi">Detail Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3"
                    placeholder="Max 1000 Character" required autocomplete="off"></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="produsen">Produsen</label>
                <input class="form-control" type="text" name="produsen" id="produsen" required>
            </div>
            <div class="mb-3 text-start">
                <label for="ukuran">Berat / Ukuran</label>
                <input class="form-control @error('ukuran') is-invalid @enderror" placeholder="10kg/10inch/10m etc."
                    type="text" name="ukuran" id="ukuran" required>
                @error('ukuran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="harga">Harga</label>
                <input class="form-control @error('harga') is-invalid @enderror" placeholder="(hanya angka)"type="text"
                    name="harga" id="harga" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="">-pilih category-</option>
                    @foreach ($cat as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3 text-start">
                <label for="gambar">Gambar <small style="color:rgb(0, 0 ,0 , .4)">*tidak wajib</small></label>
                <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar"
                    id="formfile">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-primary" type="submit">SUBMIT</button>
                <a class="btn btn-outline-danger" type="button" href="{{ route('Catalog.admin.index') }}">BACK</a>
            </div>
        </form>
    </div>

@endsection
