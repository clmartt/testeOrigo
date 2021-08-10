@extends('layouts.template')

@section('content')
    @component('components.clienteComponent',['cliente'=>$cliente])
        
    @endcomponent
@endsection