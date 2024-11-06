<!-- resources/views/allUsers.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between mb-4">
            <h1>All Users</h1>
            <a href="{{ route('users.create') }}" class="btn btn-success">Create New User</a>
            <a href="{{ url('/') }}" style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; font-size: 1.1em; text-decoration: none; border-radius: 4px; text-align: center; transition: background-color 0.3s ease;">
            Back to Main
        </a>
        </div>

        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <div class="row">
                
        @foreach ($users as $user)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <!-- Link to the user's profile -->
                <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none">
                    <div class="p-3 bg-primary text-white rounded">
                        <strong>ID:</strong> {{ $user->id }}<br>
                        <strong>Name:</strong> {{ $user->name }}<br>
                        <strong>Email:</strong> {{ $user->email }}
                    </div>
                </a>
                <!-- Delete Button -->
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
            </div>
        @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}  <!-- Pagination links -->
            </div>
        @endif
    </div>
</body>
</html>
