<?php

namespace App\Http\Controllers;


use App\Models\Record;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\RecordDetail;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {

        $records = Record::with(['customer', 'product','recordDetails.product'])->get();
        return view('records.index', compact('records'));
    }

    public function create()
    {

        $customers = Customer::all();
        $products = Product::all();

        return view('records.create', compact('customers', 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'record_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Obtener el inventario del producto
        $inventory = $product->inventory;

        // Disminuir el stock en el inventario
        try {
            $inventory->decreaseStock($request->quantity);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['stock' => $e->getMessage()]);
        }

        // Disminuir el stock en el producto
        try {
            $product->decreaseStock($request->quantity);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['stock' => $e->getMessage()]);
        }

        // Crear el registro de venta
        $record = Record::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'record_date' => $request->record_date,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ]);
        // Crear el detalle de la venta
        RecordDetail::create([
            'record_id' => $record->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price, // Obtener el precio del producto
        ]);
        return redirect()->route('records.index')->with('success', 'Venta registrada con éxito.');
    }

    public function show(Record $record)
    {
        return view('records.show', compact('record'));
    }


    public function edit(Record $record)
    {

        $customers = Customer::all();
        $products = Product::all();

        // Retornar la vista de edición con los datos necesarios
        return view('records.edit', compact('record', 'customers', 'products'));
    }


    public function update(Request $request, Record $record)
    {

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'record_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);


        $record->update($request->all());
        return redirect()->route('records.index')->with('success', 'Record actualizado exitosamente.');
    }

    public function destroy(Record $record)
    {

        $record->delete();
        return redirect()->route('records.index')->with('success', 'Record eliminado exitosamente.');
    }
}
