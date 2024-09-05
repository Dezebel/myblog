@extends('layouts.app')
@section('content')
    <h1>Blog Users Create</h1>
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Content</label>
            <textarea name="email" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
            
    </form>
@endsection 
