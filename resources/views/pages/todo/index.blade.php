@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Todo List</h1> <!-- Fixed: removed <home> tag -->
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->done }}</td>
                            <td>
                                <form action="{{ route('todo.delete', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                                
                                <a href="javascript:void(0)" class="btn btn-primary btn-sm" onClick="taskEditModel({{ $task->id }})">
                                    Update
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="taskEdit" tabindex="-1" role="dialog" aria-labelledby="taskEditTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskEditTitle">Edit Todo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="taskEditContent">
                <!-- Content will be loaded here -->
            </div>
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

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function taskEditModel(id) {
        const editUrl = "{{ route('todo.edit', ['id' => '__ID__']) }}".replace('__ID__', id);
        $.ajax({
            url: editUrl,
            type: 'GET',
            success: function(response) {
                console.log(response);
                $('#taskEditContent').html(response);
                $('#taskEdit').modal('show');
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('Error loading edit form. Please try again.');
            }
        });
    }
</script>
@endpush