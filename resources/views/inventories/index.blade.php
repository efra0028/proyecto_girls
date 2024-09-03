@extends('adminlte::page')

@section('title', 'Inventarios')

@section('content_header')
    <h1>Inventarios</h1>
@stop

@section('content')
    <a href="{{ route('inventories.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i> Nuevo Inventario</a>
    <table id="inventories" class="table table-bordered shadow-lg">
        <thead class="text-white" style="background-color: #515E78;">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->id }}</td>
                    <td>{{ $inventory->product->name }}</td>
                    <td>{{ $inventory->quantity }}</td>
                    <td>{{ $inventory->update_date }}</td>
                    <td class="text-center">
                        <a href="{{ route('inventories.edit', $inventory) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('inventories.show', $inventory) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('inventories.destroy', $inventory) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
        $(document).ready(function() {
            $('#inventories').DataTable({
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente"
                    }
                }
            });
        });
    </script>
@stop
