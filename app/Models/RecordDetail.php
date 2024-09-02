<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function record()
    {
        return $this->belongsTo(Record::class, 'record_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
