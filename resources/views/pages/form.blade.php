@extends('layouts.app')

@section('content')


{!! Form::open(['action' => ['FormController@store'], 'method' => 'POST']) !!}
{{Form::label('price','Price')}}
{{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Amount'])}}

{!! Form::close() !!}



@endsection
