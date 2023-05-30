@extends('layout.main-layout')
@section('title', 'Catalog')

@section('content')
    <div class="row justify-content-center">
        <div class="col-6 mt-4">
            <form action="{{ route('user.index') }}" method="POST">
                @csrf
                @method('GET')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Product..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="border"></div>
    <form action="{{ route('user.index') }}" method="POST">
        @method('GET')
        <div class="row mb-2 mt-2">
            <div class="col-sm-2">
                <select class="form-select" name="category" id="category">
                    <option value="">All Category</option>
                    @foreach ($category as $cat)
                        @if ($cat['id'] == request('category'))
                            <option value="{{ $cat['id'] }}" selected>{{ $cat['name'] }}</option>
                        @else
                            <option value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <select class="form-select" name="harga" id="harga">
                    <option value="">All Harga</option>
                    <option value="1-100000"@if (request('harga') == '1-100000') selected @endif>less then RP.100.000</option>
                    <option value="100000-500000"@if (request('harga') == '100000-500000') selected @endif>RP.100.000 - RP.500.000
                    </option>
                    <option value="500000-1000000"@if (request('harga') == '500000-1000000') selected @endif>RP.500.000 -
                        RP.1.000.000</option>
                    <option value="1000000-100000000"@if (request('harga') == '1000000-100000000') selected @endif>more then
                        RP.1.000.000</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select class="form-select" name="produsen" id="produsen">
                    <option value="">All Produsen</option>
                    @foreach ($produsen as $pro)
                        @if ($pro->produsen == request('produsen'))
                            <option value="{{ $pro->produsen }}" selected>{{ $pro->produsen }}</option>
                        @else
                            <option value="{{ $pro->produsen }}">{{ $pro->produsen }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 m-auto">
                <button class="btn btn-outline-success" type="submit">Filter</button>
            </div>
        </div>
    </form>
    <div class="border"></div>
    @if (sizeof($catalog))
        <div class="d-flex flex-wrap mt-2 mb-5 justify-content-center" style="gap:30px">
            @foreach ($catalog as $cat)
                <a class="hidden-card" href="{{route('user.show', $cat['id'])}}" style="text-decoration: none; color:black">
                    <div class="card user-card" style="width: 15rem; height:17rem">
                        @if ($cat['gambar'])
                            <img src="{{ asset('storage/' . $cat['gambar']) }}" width="100px" height="170px"
                                class="card-img-top" alt="">
                        @else
                            <img src="https://lh3.googleusercontent.com/0ShuqLNaGAAJ2K2hNFsDrdX16ptQJia4iXKPKhD19se1dmzLl2d2HTKZs38gzlVGixChjJmU-dvnkMpbJI4L8Lx82wm4eM2kssOiXZsCx2Zmkjt2IUy_g7AhtRR0OogmezMrWjHfCHTdGwNNZ5krcUNoIU2cVJT3tEM1PwFSSJb9WM23mLOE7sCnIxpfYMtOc-n4khA29E6rfVhmEK8SZ1qJ3bOouGeIN6CRapWiB3ckxzijOGDw36YXY0Fzh_wnSnQyZN6zXcdYbmci1OMfABOKZyGgl_M8cZm8o6rsLwCGKq6BJXTnuRZcdq9j1o9c999oOFMcFzFmsTs7CMY6KOsYUNUQFnUF73Tp3ezC848NfbaNDcWuGlqlWH73Jg8C3jI4UFfQxDvzePfZbLWSilkTfb1mr95pczAqVu_eJnUtTrYE7tqbKnXhAMJfxYonwQXTKB5OlZKoY9bxYu5Hc5CrlSvOKDztsw3wQuc51JodNAzfaX5Tk87qjGJwjYj6PEcWg37zDoL3sOess2NLS9uzXAkCRmTybUnhtSY2-EG_TS-flKcDOrT1XqhdvTnBsALzt6gqjfK8NsDE3zzaPeGjMFjaB1c01r1K0qkiXAsRaVYmcB-div1BpsA7ydsx434Gw3v6HShIQAa2uX2mKC_m63wH2IMozGOJrm4_Ckh72Lpvwc4Sss6vxK6BiMIh7ckbzk-ctvr-OyhtX_P0zF0ojXWOrrmISTg8c_L6p8kPkfJvhp5LDjRhkW77zOBkYNtZpZklYiB8nJm4gKL5HSO9LKTlEBqHGJo-52Kjl6R3962igGmJ0SH-u1LSsOR3osuMg2rIXKgroL1pd_7o0oYxZn4rQgCsSsQJlc1hgZrO6LBpEJaTs40wSbco3MUevYlMlDmZxI0zUcOHE1tol1kFNm0BHD_sS0Jfn_L2UTCeN6f7pyxX-ywy08eUzsGUkoXI71wpv1yn-us2WFM7zw=s400-no?authuser=0"
                                width="110px" height="170px" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <p class="card-text">{{ $cat['nama'] }} <br>
                                {{ 'RP.' . number_format(floatval($cat['harga']), 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $catalog->appends(Request::except('page'))->links() !!}
        </div>
    @else
        <div class="d-flex justify-content-center align-items-center" style="height: 70vh;">
            <h1>Product Not Found</h1>
        </div>
    @endif

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show-card');
                }
            });
        });

        const hiddenElement = document.querySelectorAll('.hidden-card');

        hiddenElement.forEach((el) => observer.observe(el));
    </script>
@endsection
