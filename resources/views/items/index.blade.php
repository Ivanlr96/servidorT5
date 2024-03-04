<x-app-layout>
    <form action="{{ route('items.index') }}" method="GET">
        <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}">
        <button type="submit">Buscar</button>
    </form>
<a href="{{ route('items.create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Nuevo Item</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Caja</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
        
                <td>{{ $item->name }}</td>
                <td>{{ $item->box->label }}</td>
                
                <td>

                    <a href="{{ route('items.show', $item->id) }}">Ver</a>
                    <a href="{{ route('items.edit', $item->id) }}">Editar</a>

                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>

                </td>


            </tr>
            @endforeach
        </tbody>        
    </table>


</x-app-layout>
