<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin')->only('adminDashboard');
        $this->middleware('role:ventas')->only('ventasDashboard');
        $this->middleware('role:cliente')->only('clientDashboard');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();

        return view('home', compact('products'));
    }
}
