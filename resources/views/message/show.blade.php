@extends('layout.admin-layout')
@section('title', 'Admin')

@section('pesan')
    <div class="container">
        <div class="row">

            <div class="d-flex align-items-center mt-3">
                <a href="https://www.google.com/search?q={{ $message['nama'] }}"
                    style="text-decoration: none; color:rgb(124, 203, 255)">
                    <h4>{{ $message['nama'] }}</h4>
                </a>
                <h6>({{ $message['email'] }})</h6>
                <p class="ms-auto">{{ $message['created_at']->timezone('Asia/Jakarta')->format('d/M/Y H:i') }}</p>
            </div>
            @if ($message['phone'])
                <div class="d-flex">
                    <a href="http://wa.me/{{ $message['phone'] }}" target="_blank"
                        style="text-decoration: none; color:rgb(124, 203, 255)">
                        <p>{{ $message['phone'] }}</p>
                    </a>
                </div>
            @endif

            <div class="mt-2 border border-primary-subtle">
                <p>{{ $message['body'] }}</p>
            </div>

            <div class="d-flex mt-2 mb-2 justify-content-center">
                <a href="{{ route('mails.index', $message['email']) }}" type="button" class="btn btn-success">Balas</a>
                <a href="{{ route('message.index') }}" type="button" class="btn btn-danger">Kembali</a>
            </div>
        </div>
    </div>
@endsection
