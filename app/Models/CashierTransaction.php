<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierTransaction extends Model
{
    protected $table = 'CashierTransaction';
    use HasFactory;

    protected $fillable = [
        't_id',
        't_date',
        't_PaymentMethod',
        't_TotalAmount',
        'employee_e_id',
        'membership_m_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_e_id', 'e_id');
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_m_id', 'm_id');
    }

    public function fnbItems()
    {
        return $this->belongsToMany(FnB::class, 'CashierTransaction_fnb', 'CashierTransaction_t_id', 'fnb_fb_id')->withPivot('amount');
    }

    public function addBalances()
    {
        return $this->belongsToMany(AddBalance::class, 'CashierTransaction_AddBalance', 'CashierTransaction_t_id', 'AddBalance_ab_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                $query->where('t_id', 'like', '%' . $search . '%')
                    ->orWhere('t_date', 'like', '%' . $search . '%')
                    ->orWhere('t_PaymentMethod', 'like', '%' . $search . '%')
                    ->orWhere('t_TotalAmount', 'like', '%' . $search . '%')
                    ->orWhereHas('employee', function ($query) use ($search) {
                        $query->where('e_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('membership', function ($query) use ($search) {
                        $query->where('m_username', 'like', '%' . $search . '%');
                    });
            });
        }
    }
}
