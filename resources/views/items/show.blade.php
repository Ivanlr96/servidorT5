<x-app-layout>

<form action="{{ route('items.show', $item->id) }}" method="POST">
    @csrf
    @method('PUT')


    <table>
            <tr>
                <td>Nombre:</td>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <td>Descripción:</td>
                <td>{{ $item->description }}</td>
            </tr>
            <tr>
                <td>Precio:</td>
                <td>{{ $item->price }}</td>
            </tr>
            <tr>
                <td>Caja:</td>
                @if($item->box)
                    <td>{{ $item->box->label }}</td>
                @else
                    <td>Sin caja</td>
                @endif
            </tr>
            <tr>
                <td>Imagen:</td>

                <td><img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" width="100" height="100"></td>
        </table>
</form>

</x-app-layout>
