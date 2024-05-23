<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order_details extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'order_items_id',
        'price',
    ];

    public function orderItemsIdTable()
    {
        return $this->hasOne(tbl_order_items::class, 'id' ,'order_items_id');
    }

}
