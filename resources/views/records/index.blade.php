@extends('adminlte::page')

@section('title', 'Registros')

@section('content_header')
    <h1>Registros</h1>
@stop

@section('content')
    <a href="{{ route('records.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <table id="records" class="table table-bordered shadow-lg mt-12">
        <thead class="text-white" style="background-color: #515E78;">
            <tr>
                <td width="15px">Nº</td>
                <th class="text-center">ID del Cliente</th>
                <th class="text-center">ID del Producto</th>
                <th class="text-center">Fecha de Compra</th>
                <th class="text-center">Total</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td class="text-center">{{ $record->id }}</td>
                    <td class="text-center">{{ $record->customer_id }}</td>
                    <td class="text-center">{{ $record->product_id }}</td>
                    <td class="text-center">{{ $record->purchase_date }}</td>
                    <td class="text-center">{{ $record->total }}</td>
                    <td class="text-center">
                        <a href="{{ route('records.edit', $record) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('records.show', $record) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('records.destroy', $record) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function(){
            $('#records').DataTable({
                "ordering": false,
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "Primero",
                        "last": "Último"
                    }
                }
            });
        });
    </script>
@endsection
