@extends('layout.admin-layout')
@section('title', 'Admin')

@section('profile')
    @if (Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes') }}
        </div>
    @endif
    <div class=" col-6 m-auto">
        <form action="{{ Route('profile.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <p class="mb-3 text-start" style="opacity: .3;"></p>
            <div class="mb-3 text-start">
                <label for="username">Username</label>
                <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                    id="username" required autocomplete="off">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                    id="password" required autocomplete="off">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 text-start">
                <label for="level">Level Role</label>
                <select class="form-select" name="level" id="level">
                    <option value="">-pilih level-</option>
                    <option value="admin">
                        Admin
                    </option>
                    <option value="superadmin">
                        Super Admin
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-primary" type="submit">SUBMIT</button>
                <a class="btn btn-outline-danger" type="button" href="{{ route('profile.index') }}">BACK</a>
            </div>
        </form>
    </div>
@endsection
