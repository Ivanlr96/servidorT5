<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Item</th>
                <th>Checkout Date</th>
                <th>Due Date</th>
                <th>Returned Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->user->name }}</td>

                <td>{{ $loan->item->name }}</td>
                <td>{{ $loan->checkout_date }}</td>
                <td>{{ $loan->due_date }}</td>
                <td>

                    @if($loan->return_date)
                    {{ $loan->return_date }}
                    @else
                    No finalizado
                    @endif
                </td>
                <td>
                @if($loan->return_date)
                    Prestamo finalizado
                    @else
                    <a href="{{ route('loans.edit', $loan->id) }}">Finalizar préstamo</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
