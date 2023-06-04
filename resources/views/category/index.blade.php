@extends('layout.admin-layout')
@section('title', 'Categories')

@section('category')
<div class="d-flex justify-content-between align-items-center mt-5">
    <a type="button" class="btn btn-primary mb-3 d-flex justify-content-center align-items-center" href="{{ route('category.create') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
            <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
            <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
        </svg>
        <span class="ms-2">Create Catalog</span>
    </a>
    <div>
        <form action="{{ route('category.index') }}" method="POST">
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
    <table class="table table-hover table-bordered" style="cursor: default;">
        <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        @foreach ($sort as $cat)
        <tr class="text-center">
            <td>
                {{ $loop->iteration + $sort->firstItem() - 1 }}
            </td>
            <td>{{ $cat['nama'] }}</td>
            <td>
                <form action="{{ route('category.destroy', $cat['id']) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('category.edit', $cat['id']) }}">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg> -->
                        Update
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin menghapus data?')">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                            </svg> -->
                        Delete
                    </button>
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