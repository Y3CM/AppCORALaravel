<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
         'id_user', 
         'impuesto', 
         'subtotal', 
         'total',
         'payment_status',
         'payment_method',
         'payment_id', 
         'status',
         'date_order'
    ];
}
