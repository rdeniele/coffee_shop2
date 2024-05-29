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


    <body>

            <nav class="mb-4 font-bold text-4xl text-neutral-600">KANOKANO</nav>

            <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:40%">Product</th>
                    <th style="width:20%">Addons</th>
                    <th style="width:10%">Price</th>
                    <th style="width:10%">Quantity</th>
                    <th style="width:20%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart', []) as $id => $details)
                        @php 
                            $addons_total = 0; 
                        @endphp
                        <tr data-cart-id="{{ $id }}">
                            <td data-th="Product">
                                <h4>{{ $details['item_name'] }}</h4>
                            </td>
                            <td data-th="Addons">
                                @if(isset($details['addons']))
                                    @foreach($details['addons'] as $addonId)
                                        @php
                                            $addon = App\Models\tbl_add_ons::find($addonId);
                                            if ($addon) {
                                        @endphp
                                                <p>{{ $addon->add_on_name }} - ${{ $addon->add_on_price }}</p>
                                        @php
                                                $addons_total += $addon->add_on_price; // Add addon price to addons_total
                                            }
                                        @endphp
                                    @endforeach
                                @endif
                            </td>
                            <td data-th="Price" class="price">${{ $details['item_price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" name="quantity[{{ $id }}]" value="{{ $details['quantity'] }}" class="form-control quantity" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center subtotal">${{ number_format(($details['item_price'] + $addons_total) * $details['quantity'], 2) }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                            @php
                                $total += ($details['item_price'] + $addons_total) * $details['quantity'];
                            @endphp
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><h3><strong>Total <span id="total">${{ number_format($total, 2) }}</span></strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <input type="hidden" name="total_amount" id="total" value="{{ $total }}">
                            <div class="form-group">
                                <label for="payment_option">Payment Option</label>
                                <select name="payment_option" id="payment_option" class="form-control">
                                    <option value="COD">COD</option>
                                    <option value="GCASH">GCASH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment_amount">Payment Amount</label>
                                <input type="text" name="payment_amount" id="payment_amount" class="form-control" value="{{ number_format($total, 2) }}" readonly>
                            </div>
                            <a href="{{ url('/products') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <button type="submit" class="btn btn-primary" id="checkout-btn">Place Order</button>
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
        @endsection

        @section('scripts')
        <script type="text/javascript">
            $(".quantity").change(function (e) {
                e.preventDefault();

                var ele = $(this);
                var quantity = ele.val();
                var cartItemId = ele.parents("tr").data("cart-id");

                // Increment quantity locally
                var currentQuantity = parseInt(ele.attr('value')); // Get current quantity
                var newQuantity = parseInt(quantity); // Get new quantity

                // Update input value with new quantity
                ele.attr('value', newQuantity);

                // Update the server with the new quantity
                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "PATCH",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: cartItemId,
                        quantity: newQuantity // Send the new quantity to the server
                    },
                    success: function (response) {
                        // Server successfully updated the quantity
                        window.location.reload(); // Reload the page
                    },
                    error: function(xhr, status, error) {
                        console.error("Error updating cart:", error);
                    }
                });
            });

            //Remove from cart
            $(".cart_remove").click(function (e) {
                e.preventDefault();
        
                var ele = $(this);
        
                if(confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").data("cart-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>


    </body>



</html>





@endsection