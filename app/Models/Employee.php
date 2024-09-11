<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    protected $primaryKey = 'e_id';
    public $incrementing = false;  // Assuming your IDs are not auto-incrementing
    protected $keyType = 'string'; // If your IDs are strings and not integers

    protected $fillable = [
        'e_id',
        'e_name',
        'e_address',
        'e_PhoneNumber',
        'e_email',
    ];

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                $query->where('e_name', 'like', '%' . $search . '%')
                    ->orWhere('e_address', 'like', '%' . $search . '%')
                    ->orWhere('e_PhoneNumber', 'like', '%' . $search . '%')
                    ->orWhere('e_email', 'like', '%' . $search . '%');
            });
        }
    }
}

