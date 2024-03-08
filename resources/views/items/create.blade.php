<x-app-layout>
    <h1>Crear Nuevo Item</h1>
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description"><br>
        <label for="price">Price</label>
        <input type="number" name="price" id="price"><br>
        <label for="box_id">Box</label>
        <select name="box_id" id="box_id">
            @foreach($boxes as $box)
                <option value="{{ $box->id }}">{{ $box->label }}</option>
                echo $box->id;
            @endforeach
        <label for="picture">Imagen:</label>
    <input type="file" name="picture" id="picture">


        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Item</button>
    </form>
</x-app-layout>
