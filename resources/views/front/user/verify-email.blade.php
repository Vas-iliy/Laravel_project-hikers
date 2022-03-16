@extends('layouts.layout')
@section('title', 'Error')
@section('content')
    <div class="container">
        <div class="card card-body">
            <form action="{{route('verification.send')}}" method="post">
                @csrf
                <button type="submit">Send Email</button>
            </form>
        </div>
    </div>
@endsection
