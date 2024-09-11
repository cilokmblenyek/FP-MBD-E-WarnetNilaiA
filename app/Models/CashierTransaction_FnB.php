<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierTransaction_FnB extends Model
{
    protected $table = 'CashierTransaction_FnB';
    use HasFactory;

    protected $fillable = [
        'CashierTransaction_t_id',
        'fnb_fb_id',
        'amount',
    ];
}
