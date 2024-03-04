<x-app-layout>
    <div class="container">
        <h1>Create New Box</h1>

        <form action="{{ route('boxes.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="label">Etiqueta</label>
                <input type="text" name="label" id="label" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Ubicación</label>
                <input type="text" name="location" id="location" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Box</button>
        </form>
    </div>
</x-app-layout>

