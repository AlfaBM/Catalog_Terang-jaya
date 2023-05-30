@extends('layout.admin-layout')
@section('title', 'Admin')

@section('pesan')
    @if (Session::has('succes'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('succes') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-6 mt-3">
                <form action="{{ route('message.index') }}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search Message..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- <form action="{{ route('message.index') }}" method="POST">
            <div class="dropdown">
                @method('GET')
                <button class="btn btn-secondary dropdown-toggle" type="button" id="drop" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Lihat Kapan Saja
                </button>
                <ul class="dropdown-menu" aria-labelledby="drop">
                    <li><button class="dropdown-item" type="submit" name="day" id="day" value=" {{Carbon\Carbon::now()->format("Y-m-d'T'H:i:s.sZ")}} ">Hari ini</button></li>
                    <li><button class="dropdown-item" type="submit" name="day" id="day" value="24">Kemarin</button></li>
                    <li><button class="dropdown-item" type="submit" name="day" id="day" value="48">Lebih Dari Dua Hari</button></li>
                </ul>
            </div>
        </form> --}}

        <form action="{{ route('deletecek') }}" method="POST">
            @csrf
            <table class="table table-light table-hover" style="table-layout:fixed">
                <tbody>
                    <div class="d-flex align-item-start mb-2" style="gap:10px">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Ingin menghapus data?')"
                            disabled>Delete</button>
                    </div>
                    @if (sizeof($message))
                        @foreach ($message as $mes)
                            <tr onmouseover="" style="cursor: pointer;" data-href="{{ route('message.show', $mes['id']) }}">
                                <td style="width:5vw"><input type="checkbox" name="cek[{{ $mes['id'] }}]"
                                        value="{{ $mes['id'] }}"></td>
                                <td style="width:10px;">
                                    @if ($mes['read'])
                                        <img src="https://lh3.googleusercontent.com/1mw4NxbaXMsdI3aD2N6SgtWPj8v5brsFf86MUrsmkGGA9LehTSCjS4cCLvruqC166Hn10_LA8ZEylGX9u-C9M3CumqR922GaKiPj8nLJF2uSkKjBshjmnfaFSsEnk5tP5DHdEFNdGs5v8DgyP9qHThVLEH6BMCVmZwij2Xgm0TgH0PY4PnCKCFog4ouPPRJxPckAktNCpdzUAh9hFjOj_-Db52D7eCEWNNQZtcbZstOucTb4FTggyKqwWY8UjMnCeiaODJq7rOseTi1ubs0sVuzyIqjxNnbnmmR4cxajkxwI0CUHlMMH-UTtoKK0fKIcb-G8CnxNdY8-SuErLqRGyojCT37-wIZyu6JdSIjytEUo6drkVvtIKWAFyJ_n2FlcHWCKB7udvz4wgyiQ7DYfFHwLOzoBNOBUjMZKfJ8iK0gCZIyBV7TSI5YqphPAMXRsGPtCQWU2SuXqoADntTz1_GyNr326joWgQENmdarNrjxdYMI8xr8K8F3HqtyihB3t4CM8fbU9lcD0VpF5t42m9uRxeJV-JCzxEtpssiX74Zb95beJyyLL2zIbN1jbA5ImUigt2UW-3SqPxSe5KkZz9tKcOdC0NsCs7lLHV8GniXliFH2Jfnd01D4AyD74L_FeylCEwmrrIyR70-Uc7AeHh12tYPSvC_Z6YUNMZaAcj2K5J9kuRQXT9wcBCVCvP9dZfI23iIwxMGjSH9a3pUV5ZJ5rfl2jNcOo5TNbkhjJBVXq9uYh1Ru62BkKw3TJhY8Cm_OVKAR3Ry5bsPoTmpK001RvTD-MGnxP8dGmme9G_icvzS0qUPOjCKypaLVA-ED1NHj_LN6Ny3CLawcnsMpHSksuXgv7F5o0d64klbZK0lYIX9_7jGUlOAzau6HflY39HjsLAitc1QooH3GnUnj9LjhXxqC9q50nHeLUVoxyi94gUAoVIOF8oJeo3qhUKaUHZrVDQsPeB01YpzKBkXRBDA=s512-no?authuser=0"
                                            width="25px" height="25px" alt="">
                                    @endif
                                </td>
                                <td
                                    style="width:15vw; white-space: nowrap; overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{ $mes['nama'] }}</td>
                                <td
                                    style="white-space: nowrap; overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{ $mes['body'] }}</td>

                                @if ($mes['created_at']->diffInDays(Carbon\Carbon::tomorrow()) > 0)
                                    <td style="width:15vw;">
                                        {{ $mes['created_at']->timezone('Asia/Jakarta')->format('d M') }}
                                    </td>
                                @else
                                    <td style="width:15vw;">
                                        {{ $mes['created_at']->timezone('Asia/Jakarta')->format('H:i') }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <p class="text-center">Message Not Found</p>
                    @endif
                </tbody>
            </table>
        </form>
    </div>

    <div class="flex-column justify-content-center">
        {!! $message->appends(Request::except('page'))->links() !!}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
        $(function() {
            var checkBoxes = $('[type=checkbox]');
            checkBoxes.change(function() {
                $('.btn-danger').prop('disabled', checkBoxes.filter(':checked').length < 1);
            });
            checkBoxes.change();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");

            rows.forEach(row => {
                row.addEventListener("dblclick", () => {
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>
@endsection
