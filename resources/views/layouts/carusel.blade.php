<div class="slide-one-item home-slider owl-carousel">

@foreach($posts as $post)
    <div class="site-cover site-cover-sm same-height overlay" style="background-image: url({{asset('assets/front/images/'.$post->image)}});">
        <div class="container">
            <div class="row same-height align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="post-entry">
                        <span class="post-category text-white bg-success mb-3">{{$post->category->title}}</span>
                        <h2 class="mb-4"><a href="#">{{$post->title}}</a></h2>
                        <div class="post-meta align-items-center text-left">
                            <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('assets/front/images/'.$post->user->image)}}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                            <span> - {{$post->getTime()}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

</div>
