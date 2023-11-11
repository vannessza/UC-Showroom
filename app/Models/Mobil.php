<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';

    protected $fillable = ['tipe_bahan_bakar', 'luas_bagasi'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
