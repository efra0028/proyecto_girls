<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        return view('records.index', compact('records'));
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        Record::create($request->all());
        return redirect()->route('records.index');
    }

    public function show(string $id)
    {
        $record = Record::findOrFail($id);
        return view('records.show', compact('record'));
    }

    public function edit(Record $record)
    {
        return view('records.edit', compact('record'));
    }

    public function update(Request $request, string $id)
    {
        $record = Record::findOrFail($id);
        $record->update($request->all());
        return redirect()->route('records.index');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->route('records.index')->with('success', 'El Registro fue eliminado correctamente');
    }
}
