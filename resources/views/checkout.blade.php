@extends('layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
    <title>Checkout</title>
</head>


<body class="mx-24">

    <nav class="mb-4 font-bold text-4xl text-neutral-600">KANOKANO</nav>
    <hr class="mb-8">
    <p class="text-3xl font-bold">Checkout</p>
    
    <div>
        <h2>Order Summary</h2>
        <table class="auto">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Addons</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $total = 0;
                @endphp
                @foreach($cart as $item)
                @php 
                    $addonsTotal = 0; // Initialize addonsTotal here
                @endphp
                <tr>
                    <td>{{ $item['item_name'] }}</td>
                    <td>
                        @if(is_array($item['addons']))
                            <ul>
                                @foreach($item['addons'] as $addonId)
                                    @php
                                        // Use the fully qualified model name
                                        $addon = \App\Models\tbl_add_ons::find($addonId);
                                    @endphp
                                    <li>{{ $addon->add_on_name }} - ${{ $addon->add_on_price }}</li>
                                    @php 
                                        $addonsTotal += $addon->add_on_price;
                                    @endphp
                                @endforeach
                            </ul>
                        @else
                            <ul><li>None</li></ul>
                        @endif
                    </td>
                    <td>${{ $item['item_price'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    @php 
                        $subtotal = ($item['item_price'] + $addonsTotal) * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <td>${{ $subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        <h2>Total Price</h2>
        <p>Total: ${{ $total }}</p>
    </div>

    <p class="btn-holder"><a href="{{url('/products')}}" role="button">Go Back</a> </p>
</body>
</html>


@endsection