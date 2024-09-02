<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $fillable = [
        'client_id',
        'record_date',
        'total',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function recordDetail()
    {
        return $this->hasMany(RecordDetail::class, 'record_id');
    }
}
