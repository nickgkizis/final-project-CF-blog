@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="text-center mb-5">
        @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="list-group shadow-lg d-flex align-items-center">
            <a href="{{ route('articles.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-book-open fa-2x me-3 text-danger"></i>
                <div>
                    <h4 class="mb-1">All Articles</h4>
                    <p class="mb-0">View all available articles</p>
                </div>
            </a>
            <a href="{{ route('articles.create') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-pencil-alt fa-2x me-3 text-secondary"></i>
                <div>
                    <h4 class="mb-1">Create Article</h4>
                    <p class="mb-0">Publish your articles</p>
                </div>
            </a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-users fa-2x me-3 text-primary"></i>
                <div>
                    <h4 class="mb-1">User Management</h4>
                    <p class="mb-0">Manage users and their information</p>
                </div>
            </a>
            <a href="{{ route('register') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-user-plus fa-2x me-3 text-success"></i>
                <div>
                    <h4 class="mb-1">Register</h4>
                    <p class="mb-0">Create a new account</p>
                </div>
            </a>
            <a href="{{ route('login') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-key fa-2x me-3 text-warning"></i>
                <div>
                    <h4 class="mb-1">Login</h4>
                    <p class="mb-0">Login to your account</p>
                </div>
            </a>
            
        </div>
    </div>
@endsection

@section('styles')
<style>
    .list-group{
        background-color: #ccc;
        padding:3rem;
        border-radius: 50px;
    }
    .list-group-item {
        border-radius: 50px;
        padding: 25px;
        margin:15px;
        width:40%;  
        overflow: hidden;
        background-color: transparent !important; 
        z-index: 5;
        border-left:10px solid grey;
        border-right:10px solid grey;
        border-top:transparent;
        border-bottom:transparent;
        
    }

    /* old look */
    /* .list-group-item:hover {
    transform: translate(-10px, -10px) scale(1.01);
    box-shadow: 6px 6px 0px ;
    transition: all 0.5s ease-in-out;
    background: linear-gradient(135deg, #0fffff, #000fff);
    } */

/* Overlay effect with color gradient, filling from left to right */
    .list-group-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background: linear-gradient(135deg, #0fffff, #000fff);
    transition: all 1s ease-in-out; 
    z-index: 1; 
    }

    .list-group-item:hover::before {
        width: 100%;
        z-index: 1;
    }

    .list-group-item h4 {
        font-size: 1.7rem;
        font-weight: 600;
        color: #333;
        position: relative;
        z-index: 6; 
    }

    .list-group-item p {
        font-size: 1.2rem;
        color: #555;
        position: relative;
        z-index: 6;
    }


    /* Icon styling */
    .fa-2x {
        width: 40px;
        height: 40px;
        z-index: 5;
    }
</style>
@endsection
