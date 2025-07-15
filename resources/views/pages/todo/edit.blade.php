<form action="{{ route('todo.update', $todo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $todo->title }}" required>
    </div>
    
    <div class="form-group">
        <label for="done">Status:</label>
        <select name="done" id="done" class="form-control">
            <option value="0" {{ $todo->done == 0 ? 'selected' : '' }}>Pending</option>
            <option value="1" {{ $todo->done == 1 ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
   
    <div class="form-group">
        <button type="submit" class="btn btn-success">Update Todo</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    </div>
</form>

@push('css')
<style>
    .page-title {
        padding-top: 15vh;
        font-size: 3.5rem;
        color: #4fbf4f;
    }
</style>
@endpush

