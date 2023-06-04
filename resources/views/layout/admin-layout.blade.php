<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    <div class="ps-2 d-flex">
        <div class="row flex-nowrap">
            <div class="bg-dark col-auto min-vh-100 d-flex flex-column justify-content-between">
                <div class="bg-dark">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item py-2 py-sm-2">
                            <div class="nav-link d-flex mt-1 align-items-center text-white" style="cursor: pointer;" onclick="clicked()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                </svg>
                                <span class="menu d-none ms-3 d-sm-inline">Menu</span>
                            </div>
                        </li>
                        <li class="nav-item py-2 py-sm-2 mt-5">
                            <a href="{{ route('Catalog.admin.index') }}" class="nav-link text-white d-flex text-decoration-none align-items-center" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg>
                                <span class="menu d-none ms-3 d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-2">
                            <a href="{{ route('category.index') }}" class="nav-link text-white d-flex text-decoration-none align-items-center" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tags-fill" viewBox="0 0 16 16">
                                    <path d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    <path d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                                </svg>
                                <span class="menu d-none ms-3 d-sm-inline">Categories</span>
                            </a>
                        </li>
                        @if (Session::has('superadmin'))
                        <li class="nav-item py-2 py-sm-2">
                            <a href="{{ route('profile.index') }}" class="nav-link text-white d-flex text-decoration-none align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                </svg>
                                <span class="menu d-none ms-3 d-sm-inline">Admins</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item py-2 py-sm-2">
                            <a href="{{ route('profile.show', Session::get('idadmin')) }}" class="nav-link text-white d-flex text-decoration-none align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                <span class="menu d-none ms-3 d-sm-inline">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-2">
                            <a href="{{ route('message.index') }}" class="nav-link text-whit">
                                <button class="d-flex text-decoration-none align-items-center btn p-0 border-0 text-white {{ request()->routeIs('message.index', 'message.show', 'mails.index') ? 'show active' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                                    </svg>
                                    <span class="menu d-none ms-3 d-sm-inline">
                                        Messages
                                    </span>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item py-2 py-sm-2">
                            <form action="/logout" method="post" class="nav-link d-flex text-decoration-none mt-1 align-items-center text-white">
                                @csrf
                                <button class="btn p-0 border-0 text-white" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                    </svg>
                                    <span class="menu d-none ms-3 d-sm-inline">
                                        Logout
                                    </span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body bg-image">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid d-flex justify-content-center align-items-center">
                    <a class="navbar-brand fs-4" href="{{ route('Catalog.admin.index') }}">TERANG JAYA ADMIN</a>
                </div>
            </nav>
            <div class="d-flex align-items-start" style="margin-bottom: 2rem">
                <!-- <div class="nav flex-column nav-pills me-1 pt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="{{ route('Catalog.admin.index') }}" style="text-decoration:none;"><button class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home">Home</button></a>

                    @if (Session::has('superadmin'))
                    <a class="nav-link" href="{{ route('profile.index') }}" style="text-decoration:none;"><button class="nav-link {{ request()->routeIs('profile.index', 'profile.create') ? 'active' : '' }}" id="v-pills-admin-tab" data-bs-toggle="admin" data-bs-target="#v-pills-admin" type="button" role="tab" aria-controls="v-pills-admin">Admin</button></a>
                    @endif

                    <a class="nav-link" href="{{ route('profile.show', Session::get('idadmin')) }}" style="text-decoration:none;"><button class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}" id="v-pills-profile-tab" data-bs-toggle="profile" data-bs-target="#v-pills-profile-tab" type="button" role="tab" aria-controls="v-pills-profile-tab">Profile</button></a>

                    <a class="nav-link" href="{{ route('message.index') }}">
                        <button class="nav-link {{ request()->routeIs('message.index', 'message.show', 'mails.index') ? 'show active' : '' }}" id="v-pills-messages-tab" data-bs-toggle="messages" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button></a>

                    <form class="nav-link" action="/logout" method="POST">
                        @csrf
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </form>
                </div> -->
                <div class="tab-content ps-2 pe-2 flex-fill" id="v-pills-tabContent" style="height-min:800px">
                    <div class="tab-pane fade {{ request()->routeIs('Catalog.admin.index', 'Catalog.admin.edit', 'Catalog.admin.create') ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="container " style="opacity: 1;">
                            @yield('content')
                        </div>
                    </div>

                    <div class="tab-pane fade {{ request()->routeIs('category.index', 'category.edit', 'category.create') ? 'show active' : '' }}" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                        <div class="container " style="opacity: 1;">
                            @yield('category')
                        </div>
                    </div>

                    <div class="tab-pane fade {{ request()->routeIs('profile.index', 'profile.create') ? 'show active' : '' }}" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab" tabindex="0">
                        <div class="container " style="opacity: 1;">
                            @yield('profile')
                        </div>
                    </div>

                    <div class="tab-pane fade {{ request()->routeIs('profile.show') ? 'show active' : '' }}" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="1">
                        <div class="container " style="opacity: 1;">
                            @yield('profile')
                        </div>
                    </div>
                    <div class="tab-pane fade {{ request()->routeIs('message.index', 'message.show', 'mails.index') ? 'show active' : '' }}" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="2">
                        <div class="container" style="opacity: 1;">
                            @yield('pesan')
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card-footer text-muted bg-dark fixed-bottom" style="height: 40px">
                <h5 class="text-white">Made By Love</h5>
            </div> -->
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    function clicked() {
        let menu = document.getElementsByClassName("menu");
        for (const item of menu) {
            if (item.className == "menu d-none ms-3 d-sm-inline") {
                item.className = "menu d-none ms-3";
            } else {
                item.className = "menu d-none ms-3 d-sm-inline";
            }
        }
    }
</script>

</html>