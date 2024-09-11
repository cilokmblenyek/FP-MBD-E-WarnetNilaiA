<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FnB extends Model
{
    protected $table = 'FnB';
    use HasFactory;

    protected $fillable = [
        'fb_id',
        'fb_name',
        'fb_price',
        'fb_stock'
    ];

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                $query->where('fb_id', 'like', '%' . $search . '%')
                    ->orWhere('fb_name', 'like', '%' . $search . '%')
                    ->orWhere('fb_price', 'like', '%' . $search . '%')
                    ->orWhere('fb_stock', 'like', '%' . $search . '%');
            });
        }
    }
}
