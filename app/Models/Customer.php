<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'birth_date',
        'gender'
    ];

    public function records(){
        return $this->hasMany(Record::class, 'client_id');
    }
}
