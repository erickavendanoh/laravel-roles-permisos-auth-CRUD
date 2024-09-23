<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <x-welcome /> --}}
    {{-- content
    <h1 class="text-3xl font-bold underline">
    Hello world!
    </h1> --}}

    <div class="row">
        <div class="col col-md-4 col-xl-4">
            <div class="card text-bg-primary">
                <div class="card-block">
                    <h5>Usuarios</h5>
                    @php
                        $cant_usuarios = \App\Models\User::count();
                    @endphp
                    <h2 class="text-left"><i class="fa fa-users"></i><span>{{$cant_usuarios}}</span></h2>
                    <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                </div>
            </div>
        </div>
        <div class="col col-md-4 col-xl-4">
            <div class="card text-bg-success">
                <div class="card-block">
                    <h5>Roles</h5>
                    @php
                        $cant_roles = Spatie\Permission\Models\Role::count();
                    @endphp
                    <h2 class="text-left"><i class="fa fa-lock"></i><span>{{$cant_roles}}</span></h2>
                    <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                </div>
            </div>
        </div>
        <div class="col col-md-4 col-xl-4">
            <div class="card text-bg-dark">
                <div class="card-block">
                    <h5>Blogs</h5>
                    @php
                        $cant_blogs = \App\Models\Blog::count();
                    @endphp
                    <h2 class="text-left"><i class="fa fa-pencil-square-o"></i><span>{{$cant_blogs}}</span></h2>
                    <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a></p>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
