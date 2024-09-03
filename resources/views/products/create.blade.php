@extends('adminlte::page')

@section('title', 'Crear Producto')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="category_id">Categoría</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="supplier_id">Proveedor</label>
                    <select id="supplier_id" name="supplier_id" class="form-control" required>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Imagen</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" onchange="previewImage(event)" required>
                    <img id="preview" src="#" alt="Vista previa de la imagen" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="size">Tamaño</label>
            <input type="text" id="size" name="size" class="form-control" value="{{ old('size') }}" required>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" value="{{ old('color') }}" required>
        </div>

        <div class="form-group">
            <label for="details">Detalles</label>
            <textarea id="details" name="details" class="form-control">{{ old('details') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" class="submiBtn">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop


@section('js')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres guardar este proveedor?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, guardar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario
                    document.querySelector('form').submit();
                }
            });
        });
    </script>
@stop
@section('js')
    <script>
        function previewImage(event) {
            var preview = document.getElementById('preview');
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
                preview.style.maxHeight = '200px'; // Ajusta la altura de la imagen
                preview.style.maxWidth = '200px'; // Ajusta el ancho de la imagen
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop
