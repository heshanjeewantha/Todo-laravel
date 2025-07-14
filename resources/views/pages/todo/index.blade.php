@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-lg-12 text-center">
            <h1 class="page-title">Todo list<home>
                <form action="{{route('todo.store')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Enter todo item" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Add Todo</button>
                </form>
         </div>

            <div class="col-lg-12 mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->done }}</td>
                                <td class="d-flex gap-2">
                                    <form action="" method="POST" class="me-2">
                                        @csrf
                                        @method('PUT')
                                        
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            update
                                        </button>
                                    </form>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection


@push('css')
<style>
    .page-title {
        padding-top: 15vh;
        font-size: 3.5rem;
        color: #4fbf4f;
    }
</style>
@endpush