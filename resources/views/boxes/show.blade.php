<x-app-layout>

<form action="{{ route('boxes.show', $box->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Aquí van los campos de edición del item -->
    <table>
            <tr>
                <td>Etiqueta:</td>
                <td>{{ $box->label }}</td>
            </tr>
            <tr>
                <td>Ubicación:</td>
                <td>{{ $box->location }}</td>
</tr>
        <tr>
            <tr>
                <td>Items:</td>
                <td>
                    @foreach ($items as $item)
                        {{ $item->name }},
                    @endforeach
                </td>
            </tr>
        </tr>
        </table>
</form>

</x-app-layout>
