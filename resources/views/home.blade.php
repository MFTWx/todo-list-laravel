@extends('partial.base')

@section('title', 'To Do List')

@section('content')
    
    @include('components.addTodo')
    @include('components.listTodo')

@endsection