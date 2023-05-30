@extends('layout.main-layout')
@section('title', 'Catalog')

@section('content')
    <div class="container pt-5">
        <div class="row pt-5">
            <div class="col-sm-4 hidden2">
                <img class="cat-show" src="{{ asset('storage/' . $catalog['gambar']) }}" alt="" style="height: 300px; widht:300px">
            </div>
            <div class="col-sm-6">
                <h1 class="hidden">{{ $catalog['nama']}}</h1>
                <div class="border"></div>
                <div class="text-start mt-2">
                    <p class="hidden4">Berat : {{$catalog['ukuran']}}</p>
                    <p class="hidden4">Produsen : {{$catalog['produsen']}}</p>
                    <p class="hidden4">Harga per unit : {{'RP.'.number_format(floatval($catalog['harga']), 0, ',', '.') }}</p>
                    <p class="hidden4">Deskripsi : </p>
                    <p class="hidden3">{{$catalog['deskripsi']}}</p>
                </div>
                <div class="d-flex justify-content-center pt-3 pb-2 hidden3" style="gap:50px">
                    <a class="btn btn-success " href="http://wa.me/+628813542629" target="_blank"><i class="fa-brands fa-whatsapp"></i> Pesan Sekarang</a>
                    <a class="btn btn-primary " href="{{route('user.index')}}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
