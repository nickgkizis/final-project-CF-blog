@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between mb-4">
        <h1>All Users</h1>
        <!-- Back to Main Button (optional) -->
        <!-- <a href="{{ url('/') }}" class="btn btn-secondary">Back to Main</a> -->
    </div>

    @if($users->isEmpty())
        <p>No users found.</p>
    @else
        <div class="row">
            @foreach ($users as $user)
                <div class="user col-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Link to the user's profile -->
                    <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none">
                        <div class="p-3 bg-primary text-white rounded shadow-sm">
                            <strong>ID:</strong> {{ $user->id }}<br>
                            <strong><i class="fa-solid fa-id-card"></i>:</strong> {{ $user->name }}<br>
                            <strong><i class="fa-solid fa-envelope-open-text"></i>:</strong> {{ $user->email }}
                        </div>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2 w-100">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Create New User Button -->
        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-success w-25">Create New User</a>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    @endif
</div>

@endsection
@section('styles')
<style>
    /* Additional Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f7f7f7;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .user{
        margin-bottom: 20px;
        padding: 20px;
        background-color: #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        
    }

    
</style>
@endsection