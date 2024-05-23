<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_item_list;

class ItemListController extends Controller
{

  public function index(Request $req){
        $items = tbl_item_list::all();
        return  view('item.item')->with("items", $items);
    }
    public function store(Request $req){
        $items = new tbl_item_list;
        $items -> item_name = $req -> ItemName;
        $items -> item_description = $req -> ItemDescription;
        $items -> item_amount = $req -> ItemAmount;
        $items -> item_price = $req -> ItemPrice;

        $items->save(); 
        return redirect()->back();
    }
    public function delete(Request $req){
        $items = tbl_item_list::find($req->id);
        $items->delete();
        return redirect()->back();
    }
    public function edit(Request $req){
        $items = tbl_item_list::find($req->id);
        return view('item.edit')->with("items",$items);
    }
    public function update(Request $req){
        $items = tbl_item_list::find($req->id);
        $items->update([
            'item_name' => $req->ItemName,
            'item_description' => $req->ItemDescription,
            'item_amount' => $req->ItemAmount,
            'item_price' => $req->ItemPrice,
        ]);
        return redirect()->route('items.index');
    }
}
