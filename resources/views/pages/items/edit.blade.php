<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <a href="{{ route('items.index') }}">Back to List</a>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $item->name) }}"><br><br>

        <label>Description:</label><br>
        <textarea name="description">{{ old('description', $item->description) }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
