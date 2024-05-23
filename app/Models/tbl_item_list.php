<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_item_list extends Model
{
    use HasFactory;
    protected $fillable= ['item_name','item_description','item_amount','item_price','created_at',
    'updated_at',];
}
 