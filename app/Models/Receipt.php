<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = ['record_id', 'fecha_emision', 'monto'];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }
}
