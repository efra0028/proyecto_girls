<?php

namespace App\Http\Controllers;

use App\Models\RecordDetail;
use App\Models\Record;
use App\Models\Product;
use Illuminate\Http\Request;

class RecordDetailController extends Controller
{
    public function index()
    {
        $recordDetails = RecordDetail::with('record', 'product')->get();
        return view('record_details.index', compact('recordDetails'));
    }

    public function create()
    {
        $records = Record::all();
        $products = Product::all();
        return view('record_details.create', compact('records', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'record_id' => 'required|exists:records,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        RecordDetail::create($request->all());
        return redirect()->route('record_details.index')->with('success', 'Detalle de registro creado con éxito.');
    }

    public function show(RecordDetail $recordDetail)
    {
        return view('record_details.show', compact('recordDetail'));
    }

    public function edit(RecordDetail $recordDetail)
    {
        $records = Record::all();
        $products = Product::all();
        return view('record_details.edit', compact('recordDetail', 'records', 'products'));
    }

    public function update(Request $request, RecordDetail $recordDetail)
    {
        $request->validate([
            'record_id' => 'required|exists:records,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $recordDetail->update($request->all());
        return redirect()->route('record_details.index')->with('success', 'Detalle de registro actualizado con éxito.');
    }

    public function destroy(RecordDetail $recordDetail)
    {
        $recordDetail->delete();
        return redirect()->route('record_details.index')->with('success', 'Detalle de registro eliminado con éxito.');
    }
}
