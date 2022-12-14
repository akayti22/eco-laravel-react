@extends('layout.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    Login
                </div>
                <div class="card-body">
                    <form action="{{url('/login')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Enter Your email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Your password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection