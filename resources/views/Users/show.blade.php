@extends('layouts.app')

@section('content')
    <h1>Blog Posts Details</h1>
    <a href="{{url()->previous()}}">Back</a> 
    <ul>
       <li>Name:{{$user->name}}</li>
       <li>email:{{$user->email}}</li>
    </ul>
    
@endsection 
