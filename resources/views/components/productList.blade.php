<div class="container mx-auto mt-10">
    <h1 class="text-xl font-bold mb-4">Listado de Productos</h1>
    <table id="products" class="table table-bordered shadow-lg mt-12">
        <thead class="text-white" style="background-color: #515E78;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Proveedor</th>
                <th>Imagenes</th>
                <th>Tamaño</th>
                <th>Color</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->supplier->name }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->color }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-dark btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
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
</div>
