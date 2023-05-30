@extends('layout.main-layout')
@section('title', 'Home')

@section('content')
    <section class="hidden">
        <h3 class="card-title pt-4">TERANG JAYA BANGUNAN</h3>
    </section>
    <section class="hidden2">
        <p class="card-text">Menyediakan bahan berkualitas dengan harga yang bersahabat</p>
    </section>
    <section class="hidden3">
        <a href="{{ route('user.index') }}" class="btn btn-outline-primary btn-lg">Lihat Catalog</a>
    </section>
@endsection
