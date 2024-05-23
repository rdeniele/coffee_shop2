<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_orders extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'status',
        'order_date',
    ];

    public function customerTable()
    {
        return $this->hasOne(tbl_customers::class, 'id' ,'customer_id');
    }
}
