<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Roles
        </h2>
    </x-slot>

    @can('crear-rol')
        <a class="btn btn-warning text-white" href="{{ route('roles.create') }}">Nuevo</a>
    @endcan

    <table class="table table-stripped mt-2">
        <thead style="background-color: #6777ef;">
            <th>Rol</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$rol->name}}</td>
                    <td>
                        @can('editar-rol')
                            <a class="btn btn-info text-white"  href="{{route('usuarios.edit', ['usuario' => $usuario->id])}}">Editar</a>
                        @endcan

                        @can('borrar-rol')
                            <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST">
                                {{-- El método DELETE es propio de Laravel, ya que en HTML no existe, solo existen GET y POST --}}
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Borrar</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $roles->links() }}
    </div>
</x-app-layout>