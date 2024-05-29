

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
            <p><strong>Addons</strong></p>
            @foreach($addons as $addon)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                    {{$addon->add_on_name}}, ${{$addon->add_on_price}}
                    </label>
                </div>
            @endforeach
    </body>
    


@endsection