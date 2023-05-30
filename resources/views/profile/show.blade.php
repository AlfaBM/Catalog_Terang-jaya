@extends('layout.admin-layout')
@section('title', 'Admin')

@section('profile')
    <h1 class="mb-3 text-start col-6 m-auto" style="color:rgb(0, 0, 0)">Profile</h1>
    @if (Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes') }}
        </div>
    @endif
    @if (Session::has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failed') }}
        </div>
    @endif
    @if (Session::has('unchanged'))
        <div class="alert alert-info" role="alert">
            {{ Session::get('unchanged') }}
        </div>
    @endif
    <div class="col-6 m-auto">
        <form action="{{ route('profile.update', $profile->_id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 text-start">
                <label for="username">Usename</label>
                <input class="form-control " type="text" name="username" id="username"
                    value="{{ $profile['username'] }}" required autocomplete="off">
            </div>
            <div class="mb-3 text-start">
                <label for="passwordold">Old Password <small style="color:rgb(0, 0, 0, .4)">*required if change password</small></label>
                <input class="form-control " type="password" name="passwordold" id="passwordold">
            </div>
            <div class="mb-3 text-start">
                <label for="passwordnew">New Password</label>
                <input class="form-control @error('passwordnew') is-invalid @enderror" type="password" name="passwordnew"
                    id="passwordnew" autocomplete="off">
                @error('passwordnew')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-primary" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
@endsection
