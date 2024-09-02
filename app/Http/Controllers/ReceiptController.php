<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = Receipt::all();
        return view('receipts.index', compact('receipts'));
    }

    public function create()
    {
        return view('receipts.create');
    }

    public function store(Request $request)
    {
        Receipt::create($request->all());
        return redirect()->route('receipts.index');
    }

    public function show(string $id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('receipts.show', compact('receipt'));
    }

    public function edit(Receipt $receipt)
    {
        return view('receipts.edit', compact('receipt'));
    }

    public function update(Request $request, string $id)
    {
        $receipt = Receipt::findOrFail($id);
        $receipt->update($request->all());
        return redirect()->route('receipts.index');
    }

    public function destroy(Receipt $receipt)
    {
        $receipt->delete();
        return redirect()->route('receipts.index')->with('success', 'El Recibo fue eliminado correctamente');
    }
}
