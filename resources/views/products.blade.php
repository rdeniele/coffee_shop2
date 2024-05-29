@extends('layout')  
@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Coffee Shop Products</title>
    </head>

    <body class="bg-neutral-0">

        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-16">

        <div>
        @foreach($products as $product)
            <div class="flex-row">
                    <!-- <img src="{{ asset('img') }}/{{ $product->photo }}" class="img-fluid"> -->
                    <div>
                        <p class="font-semibold text-2xl">{{ $product->item_name }}</p>
                        <p class="font-bold text-green-600 text-lg"> ${{ $product->item_price }}</p>
                    </div>    
                    <div class="btn rounded-full mb-24 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
                            <a href="{{ route('product.getInfo', $product->id) }}" role="button" class="hover:no-underline hover:text-white">View</a>
                    </div>
            </div>
            
        @endforeach
        
    </div>

    <div class="btn outline outline-1 outline-black rounded-full mb-24 bg-green-400 stroke-none font-medium text-white hover:bg-green-500">
        <a href="{{ route('cart') }}" class="hover:no-underline hover:text-white">Checkout</a>
    </div>

    </body>


</html>    





@endsection