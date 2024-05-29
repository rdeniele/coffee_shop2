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
      
      <form method="POST" action="{{ route('customer.update', ['id' => $customer->id]) }}" class="w-3/12">
        @csrf
        @method('PUT')

        {{-- customer name --}}
          <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control rounded-full px-4"id="customer_name" name="customer_name" value="{{$customer->customer_name}}" placeholder= "Enter customer name" required>
          </div>
        
          {{-- email --}}
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email"  class="form-control rounded-full px-4" id="email" name="email" value="{{$customer->email}}" placeholder="Enter your email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
          </div>
          
          {{-- phone number --}}
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel"  class="form-control rounded-full px-4" id="phone_number" name="phone_number" value="{{$customer->phone_number}}" placeholder="Enter your phone number" required pattern="[+0-9\s\-\(\)]*" title="Please enter a valid phone number.">
          </div>    
        

          
        <div class="btn rounded-full my-4 bg-purple-400 outline outline-1 outline-black font-medium text-sm text-white hover:bg-purple-500">
            <button type="submit" class="hover:no-underline hover:text-white">Update</button>
        </div>
        </form>


    </body>

</html>

@endsection


