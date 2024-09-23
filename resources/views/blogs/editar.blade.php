<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Blog
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

    <form class="form" method="POST" action="{{route('blogs.update', ['blog' => $blog->id])}}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" class="form-control" value="{{$blog->titulo}}"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <label for="contenido">Contenido</label>
                    <textarea id="contenido" name="contenido" class="form-control" style="height: 100px">{{$blog->contenido}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-app-layout>