<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
</head>
<body>
    <h1>Items List</h1>
    <a href="{{ route('items.create') }}">Create New Item</a>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Description</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id) }}">Edit</a>

                    <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color:red">Delete</button>
                    </form>

                </td>
            </tr>
            @empty
            <tr><td colspan="4">No items found</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
