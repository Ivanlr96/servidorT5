<x-app-layout>
    <table style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px;">Etiqueta</th>
                <th style="border: 1px solid black; padding: 8px;">Ubicación</th>
                <th style="border: 1px solid black; padding: 8px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boxes as $box)
            <tr>
                <td style="border: 1px solid black; padding: 8px;">{{ $box->label }}</td>
                <td style="border: 1px solid black; padding: 8px;">{{ $box->location }}</td>
                <td style="border: 1px solid black; padding: 8px;">
                    <a style="border: 1px solid black; background-color: black; color: white" href="{{ route('boxes.show', $box->id) }}">Ver</a>
                    <a style="border: 1px solid black; background-color: black; color: white"href="{{ route('boxes.edit', $box->id) }}">Editar</a>
                    <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="border: 1px solid black; background-color: red; color: white;" type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a style="border: 1px solid black; background-color: black; color: white" href="{{ route('boxes.create') }}">Crear Nueva Caja</a>
</x-app-layout>


