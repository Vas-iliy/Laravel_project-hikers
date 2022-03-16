@extends('layouts.layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <div class="card card-body">
            <form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirm</label>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Password Confirm">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
