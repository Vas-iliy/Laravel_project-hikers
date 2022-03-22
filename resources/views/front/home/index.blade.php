@extends('layouts.layout')
@section('title', 'Home')
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rounded border p-4">
                    <div class="row align-items-stretch">
                        @foreach($categories as $category)
                        <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
                            <a href="single.html" class="d-flex post-sm-entry">
                                <figure class="mr-3 mb-0"><img src="{{asset('assets/front/images/'.$category->posts[0]->image)}}" alt="Image" class="rounded"></figure>
                                <div>
                                    <span class="post-category bg-danger text-white m-0 mb-2">{{$category->title}}</span>
                                    <h2 class="mb-0">{{$category->posts[0]->title}}</h2>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 section-heading"><h2>Popular Posts</h2></div>
        </div>
        <div class="row">
            @if(!empty($popularPosts[0]))
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="entry2">
                    <a href="single.html"><img src="{{$popularPosts[0]->getImage()}}" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-success mb-3">{{$popularPosts[0]->category->title}}</span>
                    <h2><a href="single.html">{{$popularPosts[0]->title}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="{{$popularPosts[0]->user->getImage()}}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">{{$popularPosts[0]->user->name}}</a></span>
                        <span>&nbsp;-&nbsp; {{$popularPosts[0]->getTime()}}</span>
                    </div>
                    <p>{{$popularPosts[0]->description}}</p>
                </div>
            </div>
            @endif
            <div class="col-lg-6 pl-lg-4">
                @foreach($popularPosts as $k=>$post)
                    @if($k>0)
                    <div class="entry3 d-block d-sm-flex">
                        <figure class="figure order-2"><a href="single.html"><img src="{{$post->getImage()}}" alt="Image" class="img-fluid rounded"></a></figure>
                        <div class="text mr-4 order-1">
                            <span class="post-category text-white bg-success mb-3">{{$post->category->title}}</span>
                            <h2><a href="single.html">{{$post->title}}</a></h2>
                            <span class="post-meta mb-3 d-block">{{$post->getTime()}}</span>
                            <p>{{$post->description}}</p>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="section-heading mb-5 d-flex align-items-center">
                    <h2>{{$category->title}}</h2>
                    <div class="ml-auto"><a href="{{route('category', ['slug' => $category->slug])}}" class="view-all-btn">View All</a></div>
                </div>
                @if($category->posts[0])
                <div class="entry2 mb-5">
                    <a href="single.html"><img src="{{asset('assets/front/images/'.$category->posts[0]->image)}}" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-primary mb-3">{{$category->title}}</span>
                    <h2><a href="single.html">{{$category->posts[0]->title}}</a></h2>
                    <p>{{$category->posts[0]->description}}</p>
                </div>
                @endif

                @if($category->posts->count() > 1)
                    @foreach($category->posts as $post)
                    <div class="entry4 d-block d-sm-flex">
                        <figure class="figure order-2"><a href="#"><img src="{{$post->getImage()}}" alt="Image" class="img-fluid rounded"></a></figure>
                        <div class="text mr-4 order-1">
                            <h2><a href="single.html">{{$post->title}}</a></h2>
                            <span class="post-meta mb-3 d-block">{{$post->getTime()}}</span>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
