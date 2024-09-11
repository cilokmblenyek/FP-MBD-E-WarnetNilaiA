<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierTransaction_AddBalance extends Model
{
    protected $table = 'CashierTransaction_addbalance';
    use HasFactory;

    protected $fillable = [
        'CashierTransaction_t_id',
        'AddBalance_ab_id',
    ];
}
