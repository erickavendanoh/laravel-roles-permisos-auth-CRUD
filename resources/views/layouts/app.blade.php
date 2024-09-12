<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        {{--Boostrap--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.css') }}"> <!--Para iconos de Font Awesome-->
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            <livewire:navigation-menu />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-md-2">
                            <div class="collapse" id="menuHorizontal">
                                <div class="sidebar-wrapper sidebar-theme">
                                    <nav id="sidebar">
                                        <div class="shadow-bottom"></div>
                                        <ul class="nav flex-column">
                                            {{-- <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Active</a>
                                            </li> --}}
                                            <li class="nav-item">
                                            <a class="nav-link" href="/">Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" href="/usuarios"><i class="fa fa-users px-2" aria-hidden="true"></i>Usuarios</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/roles"><i class="fa fa-lock px-2" aria-hidden="true"></i>Roles</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/blogs"><i class="fa fa-pencil-square-o px-2" aria-hidden="true"></i>Blogs</a>
                                                    </li>
                                            {{-- <li class="nav-item">
                                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                                            </li> --}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-10">
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        {{--Boostrap--}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
