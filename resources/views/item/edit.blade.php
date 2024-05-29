@extends('layout')
@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Addons</title>
    </head>

    <body>

        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-4">
        <form method="POST" action="{{ route('items.update', ['id' => $items->id]) }}" class="w-3/12">
          @csrf
          @method('PUT')

          {{-- item name --}}
          <div class="form-group">
              <label for="ItemName">Item Name</label>
              <input type="text" class="form-control rounded-full px-4" id="ItemName" name="ItemName" value="{{$items->item_name}}" placeholder= "Enter item name" >
            </div>
            
            {{-- item description --}}
          <div class="form-group">
            <label for="ItemDescription">Item Description</label>
            <input type="text" class="form-control rounded-full px-4" id="ItemDescription" name="ItemDescription" value="{{$items->item_description}}" placeholder= "Enter item description" >
          </div>
          
            {{-- Item amount --}}
            <div class="form-group">
              <label for="ItemAmount">Item Quantity/Servings</label>
              <input type="number"class="form-control rounded-full px-4" id="ItemAmount" name="ItemAmount" value="{{$items->item_amount}}" placeholder="Enter Item Servings/Quantity">
            </div>
            
            {{-- item price --}}
            <div class="form-group">
              <label for="ItemPrice">Item Price</label>
              <input type="number" class="form-control rounded-full px-4" id="ItemPrice" name="ItemPrice" value="{{$items->item_price}}" placeholder="Enter item price" step="0.01">
          </div>      
            
          <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="submit" class="hover:no-underline hover:text-white">Update</button>
        </div>
          </form>
    </body>





</html>

@endsection









