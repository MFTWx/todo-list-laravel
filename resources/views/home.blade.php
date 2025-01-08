@extends('partial.base')

@section('title', 'Home Page')

@section('content')
    
    @include('components.addTodo')
    @include('components.listTodo')

@endsection