@extends('layouts.main')

@section('content')
    <main class="form-signin w-100 m-auto">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <form action="/login" method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
@endsection