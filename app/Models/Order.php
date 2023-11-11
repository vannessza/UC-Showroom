<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['id_customer', 'Tanggal'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($order) {
            $order->orderDetails()->delete();
        });
    }
}
