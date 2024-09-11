<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $table = 'Computer';
    use HasFactory;

    protected $fillable = [
        'pc_id',
        'pc_status',
        'pc_specification',
        'pc_RoomType',
    ];

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($query) use ($filters) {
                $search = $filters['search'];
                // Split search term into words
                $searchTerms = explode(' ', $search);

                foreach ($searchTerms as $term) {
                    // Apply exact matching for specific keywords
                    if (strtolower($term) === 'available' || strtolower($term) === 'unavailable') {
                        $query->where('pc_status', $term);
                    } else {
                        // Apply partial matching for other search terms
                        $query->where('pc_id', 'like', '%' . $term . '%')
                            ->orWhere('pc_status', 'like', '%' . $term . '%')
                            ->orWhere('pc_specification', 'like', '%' . $term . '%')
                            ->orWhere('pc_RoomType', 'like', '%' . $term . '%');
                    }
                }
            });
        }
    }
}
