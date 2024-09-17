<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $products;

    public function __construct()
    {
        // Obtener los productos desde el modelo (puedes modificar esta lógica según tus necesidades)
        $this->products = Product::with(['category', 'supplier'])->get();
    }

    public function render()
    {
        return view('components.product-list');
    }
}
