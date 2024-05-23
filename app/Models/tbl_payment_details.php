<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_payment_details extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'order_details_id',
        'payment_option',
        'payment_amount',
        'total',
    ];

    public function orderDetailsIdTable()
    {
        return $this->hasOne(tbl_order_details::class, 'id' ,'order_details_id');
    }
}
