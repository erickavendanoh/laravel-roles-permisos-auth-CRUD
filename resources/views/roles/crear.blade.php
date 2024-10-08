<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Rol
        </h2>
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>¡Revise los campos!</strong>
            @foreach ($errors->all() as $error)
                <span class="badge text-bg-danger">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>        
    @endif

    <form class="form" method="POST" action="{{route('roles.store')}}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="name">Nombre del Rol</label>
                    <input type="text" id="name" name="name" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="permission[]">Permisos para este rol</label>
                    <br/>
                    @foreach ($permission as $value)
                        <input type="checkbox" id="{{$value->name}}" name="permission[]" value="{{$value->name}}" class="form-check-input mt-0"> <!--La función syncPermissions() signará los permisos al rol emplenado el nombre de los permisos y no el id, por ello el value de cada <input type="checkbox"> es el nombre de cada permiso y no el id-->
                        <label for="{{$value->name}}">{{$value->name}}</label><br/>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-app-layout>