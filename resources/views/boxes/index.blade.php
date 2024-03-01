<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>Label</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($boxes as $box)
            <tr>
                <td>{{ $box->label }}</td>
                <td>{{ $box->location }}</td>
                <td>
                    <a href="{{ route('boxes.show', $box->id) }}">Show</a>
                    <a href="{{ route('boxes.create') }}">Create</a>
                    <a href="{{ route('boxes.edit', $box->id) }}">Edit</a>
                    <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>

