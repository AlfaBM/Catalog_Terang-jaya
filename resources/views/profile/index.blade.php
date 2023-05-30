@extends('layout.admin-layout')
@section('title', 'Admin')

@section('profile')
    <div class="row">
        <div class="col-6 mt-3">
            <form action="{{ route('profile.index') }}" method="POST">
                @csrf
                @method('GET')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Admin..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <a type="button" class="btn btn-outline-primary mt-3 mb-3" href="{{ route('profile.create') }}">
        Create Admin
    </a>
    @if (Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes') }}
        </div>
    @endif
    <div class="table-responsive">
        @if (sizeof($profile))
            <table class="table table-bordered ">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th width="280px">Action</th>
                </tr>

                @foreach ($profile as $prof)
                    <tr>
                        <td>
                            {{ $loop->iteration + $profile->firstItem() - 1 }}
                        </td>
                        <td>{{ $prof['username'] }}</td>
                        <td>{{ $prof['level'] }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('reset', $prof['id']) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">Reset</button>
                                </form>
                                <form action="{{ route('profile.destroy', $prof['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Ingin menghapus data?')">Delete</button>
                                </form>
                            </div>

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
