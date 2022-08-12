@extends('layouts.app')

@section('content')

$mollie = new MollieController();
$mollie->toonStatus();

@endsection