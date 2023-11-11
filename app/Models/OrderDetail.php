<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';

    protected $fillable = ['id_order', 'id_kendaraan', 'jumlah'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id');
    }
}
