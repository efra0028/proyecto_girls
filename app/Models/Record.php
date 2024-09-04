<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $fillable = [
        'customer_id',
        'product_id',
        'record_date',
        'quantity',
        'total',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

     // Definir la relación con RecordDetail
    public function recordDetails()
    {
        return $this->hasMany(RecordDetail::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product() // Define la relación con Product
    {
        return $this->belongsTo(Product::class);
    }
}
