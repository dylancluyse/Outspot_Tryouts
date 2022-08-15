@extends('layouts.app')

@section('content')

<form action="shop" method="GET">
    <label for="prijs"></label><input type="text" id="prijs" name="prijs" placeholder="Amount">
    <input type="submit" value="Submit">
</form>

@endsection
