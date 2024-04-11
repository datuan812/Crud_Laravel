<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'lophoc_id',
        'khoahoc_id',
    ];

    public function classes()
    {
        return $this->belongsTo(Lophoc::class, 'lophoc_id');
    }

    public function courses()
    {
        return $this->belongsTo(Khoahoc::class, 'khoahoc_id');
    }
}
