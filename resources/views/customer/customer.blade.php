@extends('layout')
@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Customers</title>
    </head>

    <body>

    
        <nav class="mb-2 font-bold text-4xl text-neutral-600">KANOKANO</nav>

        <hr class="mb-4">
        <form method="POST" action="/customer" class="w-3/12">
        @csrf
      
        {{-- customer name --}}
        <div class="form-group">
          <label for="customer_name">Customer Name</label>
          <input type="text" class="form-control rounded-full px-4" id="customer_name" name="customer_name" placeholder= "Enter customer name" required>
        </div>
      
        {{-- email --}}
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control rounded-full px-4" id="email" name="email" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
        </div>
        
        {{-- phone number --}}
        <div class="form-group">
          <label for="phone_number">Phone Number</label>
          <input type="tel" class="form-control rounded-full px-4" id="phone_number" name="phone_number" placeholder="Enter your phone number" required pattern="[+0-9\s\-\(\)]*" title="Please enter a valid phone number.">
        </div>    

        <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="submit" class="hover:no-underline hover:text-white">Create Customer</button>
        </div>
      </form>

    {{-- table --}}
      <table class="table">  <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if (count($customer) > 0)
            @foreach ($customer as $customer)
                <tr>
                    <th>{{ $customer->id }}</th>
                    <th>{{ $customer->customer_name }}</th>
                    <th>{{ $customer->email }}</th>
                    <th>{{ $customer->phone_number }}</th>
                    <th>{{ $customer->created_at }}</th>
                    <th>{{ $customer->updated_at }}</th>
                  
                    <th>
                        <a href="{{ route('customer.edit', ['id' => $customer->id]) }}">Edit</a>
                        <a href="/delete-customers/{{ $customer->id }}">Delete</a>  </th>
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