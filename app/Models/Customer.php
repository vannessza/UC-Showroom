<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = ['nama', 'alamat', 'no_telepon', 'ID_card'];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
