@extends('layouts.layout')
@section('title', $category->title)
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    @foreach($posts as $post)
                        <div class="entry2 mb-5">
                            <img src="{{$post->getImage()}}" alt="Image" class="img-fluid rounded">
                            <h2><a href="single.html">{{$post->title}}</a></h2>
                            <p>{{$post->description}}</p>
                            <a href="">Read More</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
