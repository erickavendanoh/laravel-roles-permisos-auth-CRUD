<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuario
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

    <form class="form" method="POST" action="{{route('usuarios.update', ['usuario' => $user->id])}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" class="form-control" value="{{$user->name}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" class="form-control" value="{{$user->email}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="confirm-password">Confirmar Password</label>
                    <input type="password" id="confirm-password" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select id="roles" name="roles[]" class="form-control" multiple="multiple">
                        @foreach ($userRole as $userRolIndex => $userRol)
                            <option value={{$userRolIndex}} selected>{{$userRol}}</option>
                        @endforeach
                        @foreach ($roles as $rolIndex => $rol)
                            <option value={{$rolIndex}}>{{$rol}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-app-layout>