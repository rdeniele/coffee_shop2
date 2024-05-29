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
      <p class="font-bold text-2xl my-4">Edit Add-on</p>

      <form method="POST" action="{{ route('addons.update', ['id' => $addons->id]) }}" class="w-3/12">
      @csrf
      @method('PUT')

      {{-- add-on name --}}
      <div class="form-group">
          <label for="AddOnName" class="font-bold">Name</label>
          <input type="text" class="form-control rounded-full px-4"  id="AddOnName" name="AddOnName" placeholder= "Addon Name"  value="{{$addons->add_on_name}}">
        </div>
        
        {{-- item price --}}
        <div class="form-group">
          <label for="AddOnPrice" class="font-bold">Price</label>
          <input type="number" class="form-control rounded-full px-4"  id="AddOnPrice" name="AddOnPrice" placeholder="Enter Price" step="0.01" value="{{$addons->add_on_price}}">
      </div>    
        <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="submit"  class="hover:no-underline hover:text-white">Update Item</button>
          </div>
      </form>

    </body>


    @endsection



</html>


