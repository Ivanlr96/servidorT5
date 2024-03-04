<x-app-layout>
    <h1>Crear Nuevo Item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description"><br>
        <label for="price">Price</label>
        <input type="text" name="price" id="price"><br>
        <label for="image">Imagen:</label>
    <input type="file" name="image" accept="image/*" required>
    

        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Item</button>
    </form>
</x-app-layout>
