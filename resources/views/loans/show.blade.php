<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Item</th>
                <th>Checkout Date</th>
                <th>Due Date</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->user->name }}</td>
                <td>{{ $loan->item->name}}</td>
                <td>{{ $loan->checkout_date }}</td>
                <td>{{ $loan->due_date }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
