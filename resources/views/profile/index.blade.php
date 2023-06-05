@extends('layout.admin-layout')
@section('title', 'Admin')

@section('profile')
<div class="d-flex justify-content-between align-items-center mt-5">
    <a type="button" class="btn btn-primary mb-3 d-flex justify-content-center align-items-center" href="{{ route('profile.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
        </svg>
        <span class="ms-2">Create Admin</span>
    </a>
    <div>
        <form action="{{ route('profile.index') }}" method="POST">
            @csrf
            @method('GET')
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Admin..." name="search" value="{{ request('search') }}">
                <button class="btn btn-dark d-flex justify-content-center align-items-center" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

@if (Session::has('succes'))
<div class="alert alert-success" role="alert">
    {{ Session::get('succes') }}
</div>
@endif
<div class="table-responsive">
    @if (sizeof($profile))
    <table class="table table-bordered ">
        <tr class="text-center">
            <th>No</th>
            <th>Username</th>
            <th>Level</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($profile as $prof)
        <tr class="text-center">
            <td>
                {{ $loop->iteration + $profile->firstItem() - 1 }}
            </td>
            <td>{{ $prof['username'] }}</td>
            <td>{{ $prof['level'] }}</td>
            <td class="d-flex justify-content-evenly">
                <form action="{{ route('reset', $prof['id']) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">Reset</button>
                </form>
                <form action="{{ route('profile.destroy', $prof['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    @else
    <p class="text-center">Admin Not Found</p>
    @endif
</div>
<div class="flex-column justify-content-center">
    {!! $profile->appends(Request::except('page'))->links() !!}
</div>
@endsection