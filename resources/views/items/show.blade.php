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
                <td>{{ $item->box->label }}</td>   
            <tr>
                <td>Imagen:</td>
                <td><img src="{{ $item->picture }}" alt="{{ $item->name }}" width="100"></td>
        </table>
</form>

</x-app-layout>