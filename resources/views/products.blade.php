@extends('layout')  
@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
            <div class="img_thumbnail productlist">
                <!-- <img src="{{ asset('img') }}/{{ $product->photo }}" class="img-fluid"> -->
                <div class="caption">
                    <h4>{{ $product->item_name }}</h4>
                    <p><strong>Price: </strong> ${{ $product->item_price }}</p>
                    
                    <p class="btn-holder"><a href="{{ route('product.getInfo', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Read More</a> </p>
                    
                    <!--<p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p> -->
                </div>
            </div>
        </div>
    @endforeach
</div>

<div>
    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Proceed to checkout</a>
</div>

@endsection