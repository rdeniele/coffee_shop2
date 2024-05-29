@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Product</title>
    </head>


    <body class="bg-neutral-0">

        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-16">


        <p class="text-2xl font-medium mb-4">{{ $product->item_name }}</p>
        <p class="mb-4">{{ $product->item_description }}<p>
        <p class="text-2xl font-semibold text-green-600 mb-8"> ${{ $product->item_price }}</p>
        <p class="text-lg font-medium">Add-ons</p>
        <form method="POST" action="{{ route('add_to_cart', $product->id) }}">
            @csrf
            @foreach($addons as $addon)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{$addon->id}}" name="addon_ids[]" id="addon_{{$addon->id}}">
                    <label class="form-check-label" for="addon_{{$addon->id}}">
                        {{$addon->add_on_name}}, ${{$addon->add_on_price}}
                    </label>
                </div>
            @endforeach
            <div class="btn outline outline-1 outline-black rounded-full my-8 bg-green-400 stroke-none font-medium text-white hover:bg-green-500">
            <button type="submit"  class="hover:no-underline hover:text-white">Add to Cart</button>
            </div>
            
        </form>

        <div class="btn outline outline-1 outline-black rounded-full mt-24 bg-red-300 stroke-none font-medium text-white hover:bg-red-400">
            <a href="{{url('/products')}}"  class="hover:no-underline hover:text-white" role="button">Go Back</a> 
        </div>

    </body>


</html>



@endsection