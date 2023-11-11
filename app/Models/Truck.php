<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'truck';

    protected $fillable = ['jumlah_roda_ban', 'luas_area_kargo'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
