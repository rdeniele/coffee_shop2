@extends('layout')
    <p><strong>Addons</strong></p>
    @foreach($addons as $addon)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
            {{$addon->add_on_name}}, ${{$addon->add_on_price}}
            </label>
        </div>
    @endforeach