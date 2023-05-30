<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    </div>
    <div class="text-center" style="margin-top: 2rem">
        <div class="card-header">
            <nav class="navbar navbar-dark bg-dark fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('Catalog.admin.index') }}">TERANG JAYA ADMIN</a>
                </div>
            </nav>
        </div>
        <div class="card-body mt-3 pt-3 pb-0 ps-0 bg-image">
            <div class="d-flex align-items-start" style="margin-bottom: 2rem">
                <div class="nav flex-column nav-pills me-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="{{ route('Catalog.admin.index') }}" style="text-decoration:none;"><button
                            class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" id="v-pills-home-tab"
                            data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab"
                            aria-controls="v-pills-home">Home</button></a>

                    @if (Session::has('superadmin'))
                        <a class="nav-link" href="{{ route('profile.index') }}" style="text-decoration:none;"><button
                                class="nav-link {{ request()->routeIs('profile.index', 'profile.create') ? 'active' : '' }}"
                                id="v-pills-admin-tab" data-bs-toggle="admin" data-bs-target="#v-pills-admin"
                                type="button" role="tab" aria-controls="v-pills-admin">Admin</button></a>
                    @endif

                    <a class="nav-link" href="{{ route('profile.show', Session::get('idadmin')) }}"
                        style="text-decoration:none;"><button
                            class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}"
                            id="v-pills-profile-tab" data-bs-toggle="profile" data-bs-target="#v-pills-profile-tab"
                            type="button" role="tab" aria-controls="v-pills-profile-tab">Profile</button></a>

                    <a class="nav-link" href="{{ route('message.index') }}">
                        <button
                            class="nav-link {{ request()->routeIs('message.index', 'message.show', 'mails.index') ? 'show active' : '' }}"
                            id="v-pills-messages-tab" data-bs-toggle="messages" data-bs-target="#v-pills-messages"
                            type="button" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">Messages</button></a>

                    <form class="nav-link"action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                </div>
                <div class="tab-content ps-2 pe-2 flex-fill" id="v-pills-tabContent" style="height-min:800px">
                    <div class="tab-pane fade {{ request()->routeIs('Catalog.admin.index', 'Catalog.admin.edit', 'Catalog.admin.create') ? 'show active' : '' }}"
                        style="border-left-style:solid; border-width:10px; border-color: rgba(0, 4, 255, 0.3);"
                        id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="container " style="opacity: 1;">
                            @yield('content')
                        </div>
                    </div>

                    <div class="tab-pane fade {{ request()->routeIs('profile.index', 'profile.create') ? 'show active' : '' }}"
                        style="border-left-style:solid; border-width:10px; border-color: rgba(0, 4, 255, 0.3);"
                        id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab" tabindex="0">
                        <div class="container " style="opacity: 1;">
                            @yield('profile')
                        </div>
                    </div>

                    <div class="tab-pane fade {{ request()->routeIs('profile.show') ? 'show active' : '' }}"
                        style="border-left-style:solid; border-width:10px; border-color: rgba(0, 4, 255, 0.3);"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="1">
                        <div class="container " style="opacity: 1;">
                            @yield('profile')
                        </div>
                    </div>
                    <div class="tab-pane fade {{ request()->routeIs('message.index', 'message.show', 'mails.index') ? 'show active' : '' }}"
                        style="border-left-style:solid; border-width:10px; border-color: rgba(0, 4, 255, 0.3);"
                        id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="2">
                        <div class="container" style="opacity: 1;">
                            @yield('pesan')
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted bg-dark fixed-bottom" style="height: 40px">
                <h5 class="text-white">Made By Love</h5>
            </div>
        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>

</html>
