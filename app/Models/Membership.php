<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'Membership';
    use HasFactory;

    protected $fillable = [
        'm_id',
        'm_username',
        'm_password',
        'm_email',
        'm_PhoneNumber',
        'm_address',
        'm_balance',
    ];

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                $query->where('m_id', 'like', '%' . $search . '%')
                    ->orWhere('m_username', 'like', '%' . $search . '%')
                    ->orWhere('m_PhoneNumber', 'like', '%' . $search . '%')
                    ->orWhere('m_email', 'like', '%' . $search . '%')
                    ->orWhere('m_address', 'like', '%' . $search . '%')
                    ->orWhere('m_StartDate', 'like', '%' . $search . '%')
                    ->orWhere('m_EndDate', 'like', '%' . $search . '%');
            });
        }
    }
}
