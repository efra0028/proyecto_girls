<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function index()
    {

        $records = Record::with(['customer', 'product'])->get();
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
            'total' => 'required|numeric',
        ]);


        Record::create($request->all());
        return redirect()->route('records.index')->with('success', 'Record creado exitosamente.');
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
