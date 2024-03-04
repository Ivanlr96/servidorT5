<x-app-layout>

<form action="{{ route('items.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Aquí van los campos de edición del item -->
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $item->name }}" required>

    <label for="description">Descripción:</label>
    <textarea name="description" required>{{ $item->description }}</textarea>

    <label for="price">Precio:</label>
    <input type="number" name="price" value="{{ $item->price }}" required>
    <label for="image">Imagen:</label>
    <input type="file" name="image" accept="image/*" required>

    <!-- Otros campos de edición -->

    <button type="submit">Guardar cambios</button>
</form>

</x-app-layout>