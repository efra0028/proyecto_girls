<?php
namespace App\Http\Controllers;

use App\Models\Product; // Asegúrate de importar el modelo Product si lo necesitas
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Este es el método que se está intentando acceder desde la ruta
    public function welcome()
    {
        // Lógica para cargar los productos
        $products = Product::all(); // Puedes ajustar esto según tu lógica

        // Retornar la vista welcome con los productos
        return view('welcome', compact('products'));
    }
}
