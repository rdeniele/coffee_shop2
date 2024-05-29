@extends('layout')
@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Cart</title>
    </head>


    <body class="font-sans">

          <nav class="mb-4 font-bold text-4xl text-neutral-600">KANOKANO</nav>
          <hr class="mb-2">


        <p class="text-xl my-2 font-semibold">Create Item</p> 
        <form method="POST" action="/items" class="w-3/12">
            @csrf

            {{-- Item name --}}
            <div class="form-group">
                <input type="text" class="form-control rounded-full px-4" id="ItemName" name="ItemName" placeholder= "Item Name" >
              </div>

              {{-- Item description --}}
              <div class="form-group">
                <input type="text" class="form-control rounded-full px-4"  id="ItemDescription" name="ItemDescription" placeholder= "Description" >
              </div>
            
              {{-- Item amount --}}
              <div class="form-group">
                <input type="number" class="form-control rounded-full px-4"  id="ItemAmount" name="ItemAmount" placeholder="Quantity / Servings">
              </div>
              
              {{-- item price --}}
              <div class="form-group">
                <input type="number" class="form-control rounded-full px-4" id="ItemPrice" name="ItemPrice" placeholder="Price" step="0.01">
            </div>    
            
              <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
              <button type="submit" class="hover:no-underline hover:text-white">Create</button>
              </div>
            </form>


            <p class="my-4 text-3xl font-bold">Items</p>
            {{-- table --}}
          <table class="table text-md font-regular">  
            <thead>
              <tr class="font-semibold">
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Amount</th>    
                  <th scope="col">Price</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody class="font-regular">
              @if (count($items) > 0)
                  @foreach ($items as $item)
                      <tr>
                          <th>{{ $item->id }}</th>
                          <th>{{ $item->item_name }}</th>
                          <th>{{ $item->item_description }}</th>
                          <th>{{ $item->item_amount }}</th>
                          <th>{{ $item->item_price }}</th>
                          <th>{{ $item->created_at }}</th>
                          <th>{{ $item->updated_at }}</th>
                        
                          <th>
                              <a href="{{ route('items.edit', ['id' => $item->id]) }}" class="hover:no-underline hover:text-red"> Edit</a>
                              <a href="/delete-items/{{ $item->id }}" class="hover:no-underline hover:text-red">Delete</a>  </th>
                      </tr>
                  @endforeach
              @else
                  <tr>
                      <th>No Data</th>
                  </tr>
              @endif
          </tbody>
        </table>

      </body>



    </body>

    <div class="flex flex-row min-h-screen justify-center items-center space-x-4">
      <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/customer') }}'">Customer</button>
      <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/items') }}'">Items</button>
      <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/addons') }}'">Add-ons</button>
      <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/products') }}'">Products</button>
  </div>
</html>

 

@endsection