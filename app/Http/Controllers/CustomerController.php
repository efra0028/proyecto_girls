<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:cliente')->only('profile');

    }
    public function profile()
    {
        // Lógica para mostrar el perfil del cliente
    }
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        Customer::create($request->all());
        return redirect()->route('customers.index');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'El cliente fue eliminado correctamente');
    }
}
