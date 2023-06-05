@extends('layout.admin-layout')
@section('title', 'Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mt-5">
    <a type="button" class="btn btn-primary mb-3 d-flex justify-content-center align-items-center" href="{{ route('Catalog.admin.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z" />
            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z" />
        </svg>
        <span class="ms-2">Create Catalog</span>
    </a>
    <div>
        <form action="{{ route('Catalog.admin.index') }}" method="POST">
            @csrf
            @method('GET')
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Catalog..." name="search" value="{{ request('search') }}">
                <button class="btn btn-dark d-flex justify-content-center align-items-center" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

<div class="container">
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
    <table class="table table-hover" style="cursor: default;">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Produsen</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>category</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($sort as $cat)
            <tr>
                <td>
                    {{ $loop->iteration + $sort->firstItem() - 1 }}
                </td>
                <td>
                    @if ($cat['gambar'])
                    <img src="{{ asset('storage/' . $cat['gambar']) }}" width="60px" height="60px" alt="gambar">
                    @else
                    <img src="https://lh3.googleusercontent.com/0ShuqLNaGAAJ2K2hNFsDrdX16ptQJia4iXKPKhD19se1dmzLl2d2HTKZs38gzlVGixChjJmU-dvnkMpbJI4L8Lx82wm4eM2kssOiXZsCx2Zmkjt2IUy_g7AhtRR0OogmezMrWjHfCHTdGwNNZ5krcUNoIU2cVJT3tEM1PwFSSJb9WM23mLOE7sCnIxpfYMtOc-n4khA29E6rfVhmEK8SZ1qJ3bOouGeIN6CRapWiB3ckxzijOGDw36YXY0Fzh_wnSnQyZN6zXcdYbmci1OMfABOKZyGgl_M8cZm8o6rsLwCGKq6BJXTnuRZcdq9j1o9c999oOFMcFzFmsTs7CMY6KOsYUNUQFnUF73Tp3ezC848NfbaNDcWuGlqlWH73Jg8C3jI4UFfQxDvzePfZbLWSilkTfb1mr95pczAqVu_eJnUtTrYE7tqbKnXhAMJfxYonwQXTKB5OlZKoY9bxYu5Hc5CrlSvOKDztsw3wQuc51JodNAzfaX5Tk87qjGJwjYj6PEcWg37zDoL3sOess2NLS9uzXAkCRmTybUnhtSY2-EG_TS-flKcDOrT1XqhdvTnBsALzt6gqjfK8NsDE3zzaPeGjMFjaB1c01r1K0qkiXAsRaVYmcB-div1BpsA7ydsx434Gw3v6HShIQAa2uX2mKC_m63wH2IMozGOJrm4_Ckh72Lpvwc4Sss6vxK6BiMIh7ckbzk-ctvr-OyhtX_P0zF0ojXWOrrmISTg8c_L6p8kPkfJvhp5LDjRhkW77zOBkYNtZpZklYiB8nJm4gKL5HSO9LKTlEBqHGJo-52Kjl6R3962igGmJ0SH-u1LSsOR3osuMg2rIXKgroL1pd_7o0oYxZn4rQgCsSsQJlc1hgZrO6LBpEJaTs40wSbco3MUevYlMlDmZxI0zUcOHE1tol1kFNm0BHD_sS0Jfn_L2UTCeN6f7pyxX-ywy08eUzsGUkoXI71wpv1yn-us2WFM7zw=s400-no?authuser=0" width="60px" height="60px" alt="">
                    @endif
                </td>
                <td style="word-wrap: break-word; max-width:5vh">{{ $cat['nama'] }}</td>
                <td>{{ $cat['produsen'] }}</td>
                <td> {{ $cat['ukuran'] }} </td>
                <td> {{ 'RP.'.number_format(floatval($cat['harga']), 0, ',', '.') }} </td>
                <td> {{ $cat['category']['name']}} </td>
                <td>
                    <form action="{{ route('Catalog.admin.destroy', $cat['id']) }}" method="POST">
                        <a class="btn p-0 border-0 text-primary" href="{{ route('Catalog.admin.edit', $cat['id']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-0 border-0 text-danger" onclick="return confirm('Ingin menghapus data?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center">Catalog Not Found</p>
    @endif
</div>

<div class="flex-column justify-content-center">
    {!! $sort->appends(Request::except('page'))->links() !!}
</div>
@endsection