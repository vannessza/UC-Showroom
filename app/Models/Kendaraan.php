<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $fillable = ['jenis', 'model', 'tahun', 'jumlah_penumpang', 'manufaktur', 'harga'];

    public function mobil()
    {
        return $this->hasOne(Mobil::class);
    }

    public function motor()
    {
        return $this->hasOne(Motor::class);
    }

    public function truck()
    {
        return $this->hasOne(Truck::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
