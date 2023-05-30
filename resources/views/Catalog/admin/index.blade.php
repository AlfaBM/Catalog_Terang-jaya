@extends('layout.admin-layout')
@section('title', 'Admin')

@section('content')
    <div class="row">
        <div class="col-6 mt-3">
            <form action="{{ route('Catalog.admin.index') }}" method="POST">
                @csrf
                @method('GET')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Catalog..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <a type="button" class="btn btn-outline-primary mb-3" href="{{ route('Catalog.admin.create') }}">
        Create Catalog
    </a>
    <div class="container mt-3">
        @if (Session::has('succes'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('succes') }}
            </div>
        @endif
        @if (Session::has('uncanged'))
            <div class="alert alert-info" role="alert">
                {{ Session::get('uncanged') }}
            </div>
        @endif
    </div>

    <div class="table-responsive">
        @if (sizeof($sort))
            <table class="table table-bordered ">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Produsen</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>category</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($sort as $cat)
                    <tr>
                        <td>
                            {{ $loop->iteration + $sort->firstItem() - 1 }}
                        </td>
                        <td>
                            @if ($cat['gambar'])
                                <img src="{{ asset('storage/' . $cat['gambar']) }}" width="60px" height="60px"
                                    alt="gambar">
                            @else
                                <img src="https://lh3.googleusercontent.com/0ShuqLNaGAAJ2K2hNFsDrdX16ptQJia4iXKPKhD19se1dmzLl2d2HTKZs38gzlVGixChjJmU-dvnkMpbJI4L8Lx82wm4eM2kssOiXZsCx2Zmkjt2IUy_g7AhtRR0OogmezMrWjHfCHTdGwNNZ5krcUNoIU2cVJT3tEM1PwFSSJb9WM23mLOE7sCnIxpfYMtOc-n4khA29E6rfVhmEK8SZ1qJ3bOouGeIN6CRapWiB3ckxzijOGDw36YXY0Fzh_wnSnQyZN6zXcdYbmci1OMfABOKZyGgl_M8cZm8o6rsLwCGKq6BJXTnuRZcdq9j1o9c999oOFMcFzFmsTs7CMY6KOsYUNUQFnUF73Tp3ezC848NfbaNDcWuGlqlWH73Jg8C3jI4UFfQxDvzePfZbLWSilkTfb1mr95pczAqVu_eJnUtTrYE7tqbKnXhAMJfxYonwQXTKB5OlZKoY9bxYu5Hc5CrlSvOKDztsw3wQuc51JodNAzfaX5Tk87qjGJwjYj6PEcWg37zDoL3sOess2NLS9uzXAkCRmTybUnhtSY2-EG_TS-flKcDOrT1XqhdvTnBsALzt6gqjfK8NsDE3zzaPeGjMFjaB1c01r1K0qkiXAsRaVYmcB-div1BpsA7ydsx434Gw3v6HShIQAa2uX2mKC_m63wH2IMozGOJrm4_Ckh72Lpvwc4Sss6vxK6BiMIh7ckbzk-ctvr-OyhtX_P0zF0ojXWOrrmISTg8c_L6p8kPkfJvhp5LDjRhkW77zOBkYNtZpZklYiB8nJm4gKL5HSO9LKTlEBqHGJo-52Kjl6R3962igGmJ0SH-u1LSsOR3osuMg2rIXKgroL1pd_7o0oYxZn4rQgCsSsQJlc1hgZrO6LBpEJaTs40wSbco3MUevYlMlDmZxI0zUcOHE1tol1kFNm0BHD_sS0Jfn_L2UTCeN6f7pyxX-ywy08eUzsGUkoXI71wpv1yn-us2WFM7zw=s400-no?authuser=0"
                                    width="60px" height="60px" alt="">
                            @endif
                        </td>
                        <td style="word-wrap: break-word; max-width:5vh">{{ $cat['nama'] }}</td>
                        <td style="word-wrap: break-word; max-width:10vw">{{ $cat['deskripsi'] }}</td>
                        <td>{{ $cat['produsen'] }}</td>
                        <td> {{ $cat['ukuran'] }} </td>
                        <td> {{ 'RP.'.number_format(floatval($cat['harga']), 0, ',', '.') }} </td>
                        <td> {{ $cat['category']['name'] }} </td>
                        <td>
                            <form action="{{ route('Catalog.admin.destroy', $cat['id']) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('Catalog.admin.edit', $cat['id']) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p class="text-center">Catalog Not Found</p>
        @endif
    </div>

    <div class="flex-column justify-content-center">
        {!! $sort->appends(Request::except('page'))->links() !!}
    </div>
@endsection
