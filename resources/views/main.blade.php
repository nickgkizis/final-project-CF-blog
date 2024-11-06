@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="text-center mb-5">
        <h1 class="mb-4 display-3">Welcome to the Main Page</h1>

        @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif


        <div class="list-group">
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">
                <h4>User Management</h4>
                <p>Manage users and their information</p>
            </a>
            <a href="{{ route('register') }}" class="list-group-item list-group-item-action">
                <h4>Register</h4>
                <p>Create a new account</p>
            </a>
            <a href="{{ route('login') }}" class="list-group-item list-group-item-action">
                <h4>Login</h4>
                <p>Login to your account</p>
            </a>
            <a href="{{ route('articles.create') }}" class="list-group-item list-group-item-action">
                <h4>Create Article</h4>
                <p>Create and publish new articles</p>
            </a>
        </div>
    </div>
@endsection
