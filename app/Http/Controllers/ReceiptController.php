<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Record;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = Receipt::with('record')->get();
        return view('receipts.index', compact('receipts'));
    }

    public function create()
    {
        $records = Record::all();
        return view('receipts.create', compact('records'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receipt_type' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'amount' => 'required|numeric',
            'record_id' => 'required|exists:records,id',
        ]);

        Receipt::create($request->all());

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }

    public function show(Receipt $receipt)
    {
        return view('receipts.show', compact('receipt'));
    }

    public function edit(Receipt $receipt)
    {
        $records = Record::all();
        return view('receipts.edit', compact('receipt', 'records'));
    }

    public function update(Request $request, Receipt $receipt)
    {
        $request->validate([
            'receipt_type' => 'required|string|max:255',
            'series' => 'nullable|string|max:255',
            'number' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'amount' => 'required|numeric',
            'record_id' => 'required|exists:records,id',
        ]);

        $receipt->update($request->all());

        return redirect()->route('receipts.index')->with('success', 'Receipt updated successfully.');
    }

    public function destroy(Receipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
    }
}
