<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipts';

    protected $fillable = [
        'record_id',
        'receipt_type',
        'series',
        'number',
        'issue_date',
        'amount',
    ];

    public function record()
    {
        return $this->belongsTo(Record::class, 'record_id');
    }
}
