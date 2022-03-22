@extends('layouts.layout')
@section('title', $tag->title)
@section('content')
    @include('layouts.head')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    @if($tag->posts->count())
                    @foreach($tag->posts as $post)
                        <div class="entry2 mb-5">
                            <img src="{{$post->getImage()}}" alt="Image" class="img-fluid rounded">
                            <h2><a href="{{route('post', ['slug' => $post->slug])}}">{{$post->title}}</a></h2>
                            <p>{{$post->description}}</p>
                            <a href="{{route('post', ['slug' => $post->slug])}}">Read More</a>
                        </div>
                    @endforeach
                    @else
                        <h1>Post None</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
