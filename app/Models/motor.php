<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motor extends Model
{
    use HasFactory;
    
    protected $table = 'motor';

    protected $fillable = ['ukuran_bagasi', 'kapasitas_bensin'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
