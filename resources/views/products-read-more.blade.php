@extends('layout')
@section('content')

<h4>{{ $product->item_name }}</h4>
<p>{{ $product->item_description }}<p>
<p><strong>Price: </strong> ${{ $product->item_price }}</p>
<p><strong>Addons:</strong></p>
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
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

<p class="btn-holder"><a href="{{url('/products')}}" class="btn btn-primary btn-block text-center" role="button">Go Back</a> </p>

@endsection