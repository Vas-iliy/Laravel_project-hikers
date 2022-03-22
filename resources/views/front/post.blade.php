@extends('layouts.layout')
@section('title', 'Post')
@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{$post->getImage()}});">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{$post->category->title}}</span>
                    <h1 class="mb-4">{{$post->title}}</h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="{{$post->user->getImage()}}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
                        <span> - {{$post->getTime()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    <p>{{$post->content}}</p>
                </div>


                <div class="pt-5">
                    <p>Tags:
                        @foreach($post->tags as $tag)
                        <a href="#">#{{$tag->title}}</a>,
                        @endforeach
                    </p>
                </div>


                {{--<div class="pt-5">
                    <h3 class="mb-5">6 Comments</h3>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jean Doe</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard">
                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Jean Doe</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply rounded">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard">
                                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Jean Doe</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply rounded">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="comment">
                            <div class="vcard">
                                <img src="images/person_1.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="reply rounded">Reply</a></p>
                            </div>
                        </li>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="#" class="p-5 bg-light">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>--}}

            </div>

            <!-- END main-content -->

            {{--Sidebar--}}
            <div class="col-md-12 col-lg-4 sidebar">
                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="{{$post->user->getImage()}}" alt="Image Placeholder" class="img-fluid mb-5">
                        <div class="bio-body">
                            <h2>{{$post->user->name}}</h2>
                        </div>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>

{{--Related Post--}}
{{--<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-5">Related Post</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="entry2 mb-5">
                    <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-primary mb-3">Sports</span>
                    <h2><a href="#">China's Best 2019 Stock Is Already Up 33% and No One Knows Why</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                        <span>&nbsp;-&nbsp; February 10, 2019</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="entry2 mb-5">
                    <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-danger mb-3">Travel</span>
                    <h2><a href="#">China's Best 2019 Stock Is Already Up 33% and No One Knows Why</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                        <span>&nbsp;-&nbsp; February 10, 2019</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="entry2 mb-5">
                    <a href="#"><img src="images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
                    <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
                    <h2><a href="#">China's Best 2019 Stock Is Already Up 33% and No One Knows Why</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                        <figure class="author-figure mb-0 mr-3 float-left"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                        <span>&nbsp;-&nbsp; February 10, 2019</span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio. laborum error in eum id veritatis quidem neque nesciunt at architecto nam ullam, officia unde dolores officiis veniam</p>
                </div>
            </div>
        </div>
    </div>


</section>--}}
@endsection
