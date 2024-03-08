<x-app-layout>
    <form action="{{ route('loans.store') }}" method="POST">
        @csrf
        <label for="item_id">Item:</label>
        <select name="item_id" id="item_id" required>
            <option value="{{ $item_id->id }}">{{ $item_id->name }}</option>
            @foreach($items as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <label for="due_date">Fecha de devolución:</label>
        <input type="date" id="due_date" name="due_date" required>


        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <script>
        $(function() {
            $("#return_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script> -->
        <button type="submit">Crear préstamo</button>
        <form>
</x-app-layout>
