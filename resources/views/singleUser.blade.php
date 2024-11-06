<!-- resources/views/singleUser.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">User Profile</h2>

        @if ($user)
            <div class="card shadow-sm">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>
        @else
            <p class="text-center text-danger">User not found.</p>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Back to All Users</a>
        </div>
    </div>
</body>
</html>
