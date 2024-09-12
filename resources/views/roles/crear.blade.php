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
                <span class="badge badge-danger">{{$error}}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            @endforeach
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
                    <label>Permisos para este rol</label>
                    <br/>
                    @foreach ($permission as $value)
                        <input type="checkbox" id="{{$value->name}}" name="{{$value->name}}" value="{{$value->id}}" class="form-check-input mt-0">
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