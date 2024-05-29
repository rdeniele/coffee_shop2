@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Main Menu</title>
</head>

<body>
    <div class="justify-center items-center">
        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-4">
    
    <div>
        <h1 class="font-semibold text-2xl text-neutral-600 mb-8">Welcome</h1>
        <div class="flex flex-col space-y-4">
            
    <div class="flex flex-row min-h-screen justify-center items-center space-x-4">
        {{-- <div class="btn rounded-full my-4 bg-purple-300 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="button" class="hover:no-underline hover:text-white" onclick="window.location.href='{{ url('/customer') }}'">Customer</button>
        </div> --}}

        <div class="btn rounded-full my-4 bg-purple-300 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="button" class="hover:no-underline hover:text-white"  onclick="window.location.href='{{ url('/items') }}'">Items</button>
        </div>

        <div class="btn rounded-full my-4 bg-purple-300 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="button" class="hover:no-underline hover:text-white" onclick="window.location.href='{{ url('/addons') }}'">Addons</button>
        </div>

        <div class="btn rounded-full my-4 bg-purple-300 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="button" class="hover:no-underline hover:text-white" onclick="window.location.href='{{ url('/products') }}'">Products</button>
        </div>
    </div>
    
</body>
</html>


@endsection