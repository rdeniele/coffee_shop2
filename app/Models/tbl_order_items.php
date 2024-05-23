<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_order_items extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'item_list_id',
        'add_on_ids',
        'quantity',
    ];

    public function orderIdTable()
    {
        return $this->hasOne(tbl_orders::class, 'id' ,'order_id');
    }

    public function itemListIdTable()
    {
        return $this->hasOne(tbl_item_list::class, 'id' ,'item_list_id');
    }
}
