@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Todo App</h1>
    <p>This is the home page. You can manage your todos from here.</p>
    <a href="{{ route('todo') }}" class="btn btn-primary">Go to Todos</a>
</div>
@endsection