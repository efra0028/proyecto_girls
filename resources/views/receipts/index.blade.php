@extends('adminlte::page')

@section('title', 'Comprobante')

@section('content_header')
    <h1>Comprobantes</h1>
@stop

@section('content')
    <a href="{{ route('receipts.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Nuevo</a>
    <table id="receipts" class="table table-bordered shadow-lg mt-12">
        <thead class="text-white" style="background-color: #515E78;">
            <tr>
                <td width="15px">Nº</td>
                <th class="text-center">ID del Registro</th>
                <th class="text-center">Fecha de Emisión</th>
                <th class="text-center">Monto</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receipts as $receipt)
                <tr>
                    <td class="text-center">{{ $receipt->id }}</td>
                    <td class="text-center">{{ $receipt->record_id }}</td>
                    <td class="text-center">{{ $receipt->fecha_emision }}</td>
                    <td class="text-center">{{ $receipt->monto }}</td>
                    <td class="text-center">
                        <a href="{{ route('receipts.edit', $receipt) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('receipts.show', $receipt) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('receipts.destroy', $receipt) }}" method="POST" style="display:inline;">
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
            $('#receipts').DataTable({
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
