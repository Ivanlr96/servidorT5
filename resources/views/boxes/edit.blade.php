<x-app-layout>
    <div class="container">
        <h1>Edit Box</h1>
        <form action="{{ route('boxes.update', $box->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="label">label</label>
                <input type="text" name="label" id="label" value="{{ $box->label }}">
            </div>

            <div class="form-group">
                <label for="location">location</label>
                <input type="text" name="location" id="location" value="{{ $box->location }}">
            </div>

            <button type="submit">Actualizar</button>
        </form>
    </div>
</x-app-layout>