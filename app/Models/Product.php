<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id',
        'supplier_id',
        'image',
        'size',
        'color',
        'details'

    ];
    // Relación con la tabla categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relación con la tabla suppliers
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    // Relación con la tabla inventories
    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'product_id');
    }

    // Relación con la tabla recordDetails
    public function recordDetail()
    {
        return $this->hasMany(RecordDetail::class, 'product_id');
    }

    // Método para disminuir el stock
    public function decreaseStock($quantity)
    {
        if ($this->stock >= $quantity) {
            $this->stock -= $quantity;
            $this->save();
        } else {
            throw new \Exception("No hay suficiente stock disponible en el producto.");
        }
    }
}
