<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full viewport height */
        }
        .container {
            max-width: 1200px;
        }
        header {
            background-color: #343a40;
            padding: 25px 0;
            color: #fff;
        }
        nav a {
            color: #fff;
            text-decoration: none;
        }
        .list-group-item {
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .list-group-item:hover {
            background-color: #007bff;
            color: white;
        }
        span {
            font-size: 2.5rem;
            color: #6c757d;
            margin-left: 10px;
        }
        .nav-i{
            margin:0 10px;
        }
        .nav-mid{
            display: flex;
        }
        nav a{
            font-size: 2.5rem;
        }
        nav i{
            font-size: 2.5rem;
        }
        
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 30px 0; /* Increase padding for bigger footer */
            font-size: 1.25rem;
            text-align: center;
            margin-top: auto; /* Pushes footer to the bottom */
        }
    
        
        /* Modal Styling */
        .login-success-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: none; /* Hidden by default */
            align-items: center;
            justify-content: center;
            z-index: 999;
        }
        .login-success-modal.show {
            display: flex;
        }
        .icon-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            font-size: 15rem;
            transition: all 1s ease-in-out;
        }
        .icon-container .fa-lock-open {
            display: none;
        }
        .icon-container.unlock .fa-lock {
            display: none;
        }
        .icon-container.unlock .fa-lock-open {
            display: inline;
        }
    </style>
    
    @yield('styles') <!-- Allow for page-specific styles -->
</head>
<body>
<header>
    <nav class="text-center d-flex justify-content-center align-items-center">
        <div class="nav-out d-flex">
            <div class="nav-mid me-5">
                <div class="nav-i">
                    <a href="{{ url('/') }}" class="vertical-line"><i class="fa-solid fa-house"></i></a>
                    <p>Home</p>
                </div>
                <div class="nav-i">
                    <a href="{{ route('articles.index') }}" class="vertical-line"><i class="fa-solid fa-book-open"></i></a>
                    <p>Articles</p>
                </div>
                <div class="nav-i">
                    <a href="{{ route('articles.create') }}" class="vertical-line"><i class="fa-solid fa-pencil-alt"></i></a>
                    <p>Create</p>
                </div>
            </div>
            <div class="nav-mid ms-5">
                @auth
                <div class="nav-i">
                    <span><i class="fa-solid fa-lock-open"></i></span>
                    <p>User: {{ auth()->user()->name }}!</p>
                </div>

                <div class="nav-i">
                    <!-- Change from form to link for consistency -->
                    <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                    <p>Logout</p>
                    <!-- Hidden form for logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>  

                @else  
                <div class="nav-i">
                    <span><i class="fa-solid fa-lock fa-lg"></i></span>
                    <p>Viewing as guest</p>
                </div>
                <div class="nav-i">
                    <a href="{{ route('login') }}"><i class="fas fa-key"></i></a>
                    <p>Login</p>
                </div>
                <div class="nav-i">
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                    <p>Register</p>
                </div>
                @endauth
            </div>
        </div>
        
    </nav>
</header>


    <div class="container mt-5 content">
        @yield('content') <!-- Page-specific content will be injected here -->
    </div>

    <footer>
        <p>&copy; 2024 My Website. All rights reserved.</p>
        <p>Contact us at info@example.com</p>
    </footer>
    <div class="login-success-modal" id="loginSuccessModal">
        <div class="icon-container" id="iconContainer">
            <i class="fa-solid fa-lock"></i>
            <i class="fa-solid fa-lock-open"></i>
        </div>
    </div>
    <script>
        // Show modal if login was successful (simulate using a session flash message)
        @if(session('login_success'))
            document.getElementById('loginSuccessModal').classList.add('show');
            setTimeout(() => {
                // Add 'unlock' class to trigger icon transition
                document.getElementById('iconContainer').classList.add('unlock');
            }, 500); // Delay for initial effect

            // Hide the modal after 3 seconds
            setTimeout(() => {
                document.getElementById('loginSuccessModal').classList.remove('show');
            }, 5000);
        @endif
    </script>

    @yield('scripts') <!-- Allow for page-specific scripts -->
</body>
</html>
