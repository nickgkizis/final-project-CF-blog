<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Modern and clean font */
            background-color: #f8f9fa; /* Light background for contrast */
            color: #333; /* Dark text for better readability */
        }
        .container {
            max-width: 1200px; /* Increase container width for bigger layout */
        }
        header {
            background-color: #343a40;
            padding: 15px 0;
            color: #fff;
        }
        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .btn {
            padding: 12px 25px;
            font-size: 16px;
        }
        .list-group-item {
            padding: 20px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #007bff;
            color: white;
        }
        span{
            font-size: 2rem;
            color: #6c757d;
            margin-left: 10px;
        }
    </style>
    
    @yield('styles') <!-- Allow for page-specific styles -->
</head>
<body>
    <header>

        <nav class="text-center">
        @auth
            <span>User, [{{ auth()->user()->name }}] is currently logged in!</span>
            
            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-link text-white">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
        </nav>
    </header>

    <div class="container mt-5">
        @yield('content') <!-- Page-specific content will be injected here -->
    </div>

    @yield('scripts') <!-- Allow for page-specific scripts -->
</body>
</html>
