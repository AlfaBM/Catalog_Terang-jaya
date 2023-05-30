@extends('layout.admin-layout')
@section('title', 'Admin')

@section('content')

    <div class="col-6 m-auto">
        <form action="{{ Route('Catalog.admin.update', $catalog['id']) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 text-start">
                <label for="nama">Nama Produk</label>
                <input class="form-control " type="text" name="nama" id="nama" value="{{ $catalog['nama'] }}"
                    required autocomplete="off">
            </div>
            <div class="mb-3 text-start">
                <label for="deskripsi">Detail Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3"
                    placeholder="Max 500 Character (huruf)" required autocomplete="off">{{ $catalog['deskripsi'] }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="produsen">Produsen</label>
                <input class="form-control" value="{{ $catalog['produsen'] }}" type="text" name="produsen" id="produsen"
                    required>
            </div>
            <div class="mb-3 text-start">
                <label for="ukuran">Ukuran</label>
                <input class="form-control @error('ukuran') is-invalid @enderror" value="{{ $catalog['ukuran'] }}"
                    type="text" name="ukuran" id="ukuran" placeholder="" required>
                @error('ukuran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="harga">Harga</label>
                <input class="form-control @error('harga') is-invalid @enderror" value="{{ 'RP.'.number_format(floatval($catalog['harga']), 0, ',', '.') }}"
                    type="text" name="harga" id="harga" required>
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="category">Category</label>
                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                    <option value="">-pilih category-</option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="gambarold">Gambar</label>
                @if ($catalog['gambar'])
                    <img id="gambarold" name="gambarold" src="{{ asset('storage/' . $catalog['gambar']) }}" widht="130px"
                        height="60ox" alt="">
                @else
                    <img src="https://lh3.googleusercontent.com/0ShuqLNaGAAJ2K2hNFsDrdX16ptQJia4iXKPKhD19se1dmzLl2d2HTKZs38gzlVGixChjJmU-dvnkMpbJI4L8Lx82wm4eM2kssOiXZsCx2Zmkjt2IUy_g7AhtRR0OogmezMrWjHfCHTdGwNNZ5krcUNoIU2cVJT3tEM1PwFSSJb9WM23mLOE7sCnIxpfYMtOc-n4khA29E6rfVhmEK8SZ1qJ3bOouGeIN6CRapWiB3ckxzijOGDw36YXY0Fzh_wnSnQyZN6zXcdYbmci1OMfABOKZyGgl_M8cZm8o6rsLwCGKq6BJXTnuRZcdq9j1o9c999oOFMcFzFmsTs7CMY6KOsYUNUQFnUF73Tp3ezC848NfbaNDcWuGlqlWH73Jg8C3jI4UFfQxDvzePfZbLWSilkTfb1mr95pczAqVu_eJnUtTrYE7tqbKnXhAMJfxYonwQXTKB5OlZKoY9bxYu5Hc5CrlSvOKDztsw3wQuc51JodNAzfaX5Tk87qjGJwjYj6PEcWg37zDoL3sOess2NLS9uzXAkCRmTybUnhtSY2-EG_TS-flKcDOrT1XqhdvTnBsALzt6gqjfK8NsDE3zzaPeGjMFjaB1c01r1K0qkiXAsRaVYmcB-div1BpsA7ydsx434Gw3v6HShIQAa2uX2mKC_m63wH2IMozGOJrm4_Ckh72Lpvwc4Sss6vxK6BiMIh7ckbzk-ctvr-OyhtX_P0zF0ojXWOrrmISTg8c_L6p8kPkfJvhp5LDjRhkW77zOBkYNtZpZklYiB8nJm4gKL5HSO9LKTlEBqHGJo-52Kjl6R3962igGmJ0SH-u1LSsOR3osuMg2rIXKgroL1pd_7o0oYxZn4rQgCsSsQJlc1hgZrO6LBpEJaTs40wSbco3MUevYlMlDmZxI0zUcOHE1tol1kFNm0BHD_sS0Jfn_L2UTCeN6f7pyxX-ywy08eUzsGUkoXI71wpv1yn-us2WFM7zw=s400-no?authuser=0"
                        width="60px" height="60px" alt="">
                @endif
            </div>
            <div class="mb-3 text-start">
                <label for="gambarnew">Update Gambar <small style="color:rgb(0, 0 ,0 , .4)">*jika ingin
                        update</small></label>
                <input class="form-control @error('gambarnew') is-invalid @enderror" type="file" name="gambarnew"
                    id="formfile">
                @error('gambarnew')
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
