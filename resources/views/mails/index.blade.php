@extends('layout.admin-layout')
@section('title', 'Admin')

@section('pesan')
    <div class="container">
        <form class="mt-2" action="{{ route('mails.kirim') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email">Send To</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ $addr }}" readonly>
            </div>
            <div class="mb-3 text-start">
                <label for="isi">Balasan</label>
                <textarea class="ckeditor form-control" name="isi" id="isi" cols="30" rows="10"></textarea>
            </div>
            <button class="btn btn-success mb-2" type="submit">Kirim</button>
        </form>
    </div>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
