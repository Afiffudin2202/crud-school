@extends('layouts.main')
@section('content')
    <main class="form-signin w-50 m-auto mt-5 bg-secondary p-5 rounded-1" >
        <form action="" method="post"> 
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            
            <button class="btn btn-primary w-100 " type="submit">Sign in</button>
            <p class="mt-2 mb-3 text-body-secondary text-center">have no account ? <a href="{{ url('register') }}">Register now</a></p>
        </form>
    </main>
@endsection
