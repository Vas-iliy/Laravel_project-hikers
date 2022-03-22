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
                            @foreach($post->tags as $tag)
                            <span class="post-category text-white bg-success mb-3">{{$tag->title}}</span>
                            @endforeach
                            <h2><a href="single.html">{{$post->title}}</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{$post->user->getImage()}}" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                                <span>&nbsp;-&nbsp; {{$post->getTime()}}</span>
                            </div>
                            <p>{{$post->description}}</p>
                            <a href="">Read More</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
