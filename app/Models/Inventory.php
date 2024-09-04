<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $fillable = [
        'product_id',
        'quantity',
        'image',
        'update_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Método para disminuir el stock
    public function decreaseStock($quantity)
    {
        if ($this->quantity >= $quantity) {
            $this->quantity -= $quantity;
            $this->update_date = now();
            $this->save();
        } else {
            throw new \Exception("No hay suficiente stock disponible.");
        }
    }
}
