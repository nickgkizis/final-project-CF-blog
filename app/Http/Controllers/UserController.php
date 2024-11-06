<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create and save the user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Hash the password
        $user->save();

        // Log the user in automatically
        Auth::login($user);

        // Redirect to dashboard or home
        return redirect('/dashboard');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            session()->flash('message', 'Welcome back, ' . auth()->user()->name . '! You are successfully logged in!');
            return redirect('/');
        }
        
        
        

        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle logout
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

     // Show all users
    public function index()
    {
        $users = User::paginate(20); // Paginate the list of users
        return view('allUsers', compact('users')); // Return the view with users data
    }

    // Show form to create a new user
    public function create()
    {
        return view('createUser');
    }

    // Store a new user
    public function store(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed', // Password should be confirmed and at least 8 characters
    ]);

    // Hash the password before saving the user
    $validated['password'] = Hash::make($validated['password']);

    // Create the user with the validated data
    User::create($validated);

    return redirect()->route('users.index')->with('success', 'User created successfully!');
}

    // Show a specific user
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }

        return view('singleUser', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        // Check if user exists
        if ($user) {
            // Delete the user
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully!');
        }

        return redirect()->route('users.index')->with('error', 'User not found.');
    }
}
