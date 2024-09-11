<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarnetSystem extends Model
{
    protected $table = 'WarnetSystem';
    use HasFactory;

    protected $fillable = [
        'ws_id',
        'ws_StartTime',
        'ws_EndTime',
        'ws_BalanceUsed',
        'computer_pc_id',
        'membership_m_id'
    ];

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_pc_id', 'pc_id');
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_m_id', 'm_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                $query->where('ws_id', 'like', '%' . $search . '%')
                    ->orWhere('ws_BalanceUsed', 'like', '%' . $search . '%')
                    ->orWhere('ws_StartTime', 'like', '%' . $search . '%')
                    ->orWhere('ws_EndTime', 'like', '%' . $search . '%')
                    ->orWhereHas('computer', function ($query) use ($search) {
                        $query->where('pc_id', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('membership', function ($query) use ($search) {
                        $query->where('m_username', 'like', '%' . $search . '%');
                    });
            });
        }
    }
}
