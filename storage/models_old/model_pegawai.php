<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_pegawai extends Model
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
}
