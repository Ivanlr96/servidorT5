<x-app-layout>
        <input type="text" id="search" name="search" placeholder="Buscar">
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
                <td>{{ $item->box_id ? $item->box->label :'sin caja' }}</td>

                <td>

                    <a href="{{ route('items.show', $item->id) }}">Ver</a>
                    <a href="{{ route('items.edit', $item->id) }}">Editar</a>
                    @if($item->activeLoan())
                    <a href="{{ route('loans.show', $item->activeLoan()->id) }}" title="Ver Prestamo" class="w-full bg-yellow-600 text-center rounded-lg p-2">Ver Prestamo</a>
                    @else
                    <a href="{{ route('loans.create',$item->id) }}" title="Prestar Item" class="w-full bg-green-600 text-center rounded-lg p-2">Prestar</a>
                    @endif
                    <form action="{{ route('items.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>

                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        const search = document.getElementById('search');
        const table = document.querySelector('table');
        const tr = table.querySelectorAll('tr');
        search.addEventListener('keyup', function() {
            const q = search.value.toLowerCase();
            tr.forEach(function(item) {
                if (item.textContent.toLowerCase().includes(q)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>

</x-app-layout>
