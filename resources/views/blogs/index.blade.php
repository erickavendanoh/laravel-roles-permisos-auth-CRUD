<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blogs
        </h2>
    </x-slot>
    @can('crear-blog')
        <a class="btn btn-warning text-white" href="{{ route('blogs.create') }}">Nuevo</a>
    @endcan
    
    <table class="table table-stripped mt-2">
        <thead style="background-color: #6777ef;">
            <th style="display: none;">ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td style="display: none;">{{$blog->id}}</td>
                    <td>{{$blog->titulo}}</td>
                    <td>{{$blog->contenido}}</td>
                    <td>
                        @can('editar-blog')
                            <a class="btn btn-info text-white"  href="{{route('blogs.edit', ['blog' => $blog->id])}}">Editar</a>
                        @endcan

                        @can('borrar-blog')
                            <form action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="POST">
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
        {{ $blogs->links() }}
    </div>
</x-app-layout>