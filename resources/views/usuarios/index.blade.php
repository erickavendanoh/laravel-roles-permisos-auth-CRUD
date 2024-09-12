<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>
    <a class="btn btn-warning text-white" href="{{ route('usuarios.create') }}">Nuevo</a>
    
    <table class="table table-stripped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="display: none;">ID</th>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Rol</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td style="display: none;">{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        @if(!empty($usuario->getRoleNames()))
                            @foreach ($usuario->getRoleNames() as $rolName)
                                <h5><span>{{$rolName}}</span></h5>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info text-white"  href="{{route('usuarios.edit', ['usuario' => $usuario->id])}}">Editar</a>
                        <form action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="POST">
                            {{-- El método DELETE es propio de Laravel, ya que en HTML no existe, solo existen GET y POST --}}
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $usuarios->links() }}
    </div>
</x-app-layout>