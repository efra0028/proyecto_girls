<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'nullable|image|max:2048', // Validación para la imagen
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'details' => 'nullable|string',
        ]);

        // Manejo de la imagen
        $imagePath = null; // Inicializa la variable para la ruta de la imagen

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Guarda la imagen en el directorio 'public/images'
        }

        // Crear el producto
        $product = Product::create(array_merge($request->all(), ['image' => $imagePath])); // Guarda la ruta de la imagen en la base de datos

        // Crear el inventario correspondiente
        Inventory::create([
            'product_id' => $product->id, // Usar el ID del producto recién creado
            'quantity' => $request->stock, // Usar el stock proporcionado
            'update_date' => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
    }


    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'details' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
