<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        // Obtener todos los inventarios
        $inventories = Inventory::with('product')->get();

        // Retornar la vista con los datos
        return view('inventories.index', compact('inventories'));
    }


    public function create()
    {
        // Obtener todos los productos para los dropdowns
        $products = Product::all();

        // Retornar la vista de creación con los datos necesarios
        return view('inventories.create', compact('products'));
    }

    public function store(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'update_date' => 'required|date',
        ]);

        // Crear un nuevo registro de inventario en la base de datos
        Inventory::create($request->all());

        // Redirigir a la lista de inventarios con un mensaje de éxito
        return redirect()->route('inventories.index')->with('success', 'Inventario creado exitosamente.');
    }

    public function show(Inventory $inventory)
    {
        // Retornar la vista de detalles de un inventario
        return view('inventories.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        // Obtener todos los productos para los dropdowns
        $products = Product::all();

        // Retornar la vista de edición con los datos necesarios
        return view('inventories.edit', compact('inventory', 'products'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'update_date' => 'required|date',
        ]);

        // Actualizar el registro de inventario en la base de datos
        $inventory->update($request->all());

        // Redirigir a la lista de inventarios con un mensaje de éxito
        return redirect()->route('inventories.index')->with('success', 'Inventario actualizado exitosamente.');
    }


    public function destroy(Inventory $inventory)
    {
        // Eliminar el registro de inventario de la base de datos
        $inventory->delete();

        // Redirigir a la lista de inventarios con un mensaje de éxito
        return redirect()->route('inventories.index')->with('success', 'Inventario eliminado exitosamente.');
    }
}
