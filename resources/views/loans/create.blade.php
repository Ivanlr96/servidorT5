<x-app-layout>
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="{{ $item->name }}" required>
    
    <label for="return_date">Fecha de devolución:</label>
    <input type="text" id="return_date" name="return_date" required>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    
    <script>
        $(function() {
            $("#return_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>
    <button type="submit">Crear préstamo</button>
</x-app-layout>