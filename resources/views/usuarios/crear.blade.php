<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Alta de usuarios
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

    <form class="form" method="POST" action="{{route('usuarios.store')}}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" autocomplete="off"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" autocomplete="off"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="confirm-password">Confirmar Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="form-control" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select id="roles" name="roles[]" class="form-control" multiple="multiple">
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