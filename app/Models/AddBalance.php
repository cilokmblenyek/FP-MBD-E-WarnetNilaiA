<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBalance extends Model
{
    protected $table = 'AddBalance';
    use HasFactory;

    protected $fillable = [
        'ab_id',
        'ab_balance',
        'ab_price'
    ];
}
