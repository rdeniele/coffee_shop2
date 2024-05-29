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

    <body class="bg-neutral-0">

        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-4">
        <form method="POST" class="w-3/12" action="/addons">
    @csrf

            <div class="form-group">
                
                <input type="text" class="form-control rounded-full px-4" id="AddOnName" name="AddOnName" placeholder= "Add-On Name" required >
            </div>
            
            <div class="form-group">
                
                <input type="number" class="form-control rounded-full px-4" id="AddOnPrice" name="AddOnPrice" placeholder="Add-On price" step="0.01" required>
            </div>    
            
            <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="submit" class="hover:no-underline hover:text-white">Create Addon</button>
            </div>
            </form>

            
            {{-- table --}}
        <table class="table">  <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Addon Name</th>
                <th scope="col">Addon Price</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($addons) > 0)
                @foreach ($addons as $add_on)
                    <tr>
                        <th>{{ $add_on->id }}</th>
                        <th>{{ $add_on->add_on_name }}</th>
                        <th>{{ $add_on->add_on_price }}</th>
                        <th>{{ $add_on->created_at }}</th>
                        <th>{{ $add_on->updated_at }}</th>
                    
                        <th>
                            <a href="{{ route('addons.edit', ['id' => $add_on->id]) }}">Edit</a>
                            <a href="/delete-addons/{{ $add_on->id }}">Delete</a>  </th>
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
    <div class="flex flex-row min-h-screen justify-center items-center space-x-4">
        <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/customer') }}'">Customer</button>
        <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/items') }}'">Items</button>
        <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/addons') }}'">Add-ons</button>
        <button type="button" class="btn outline outline-1 outline-black rounded-full py-2 px-4 bg-purple-400 font-medium text-white hover:bg-green-500" onclick="window.location.href='{{ url('/products') }}'">Products</button>
    </div>
</html>


@endsection