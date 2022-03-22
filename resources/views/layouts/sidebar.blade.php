<div class="sidebar-box">
    <h3 class="heading">Popular Posts</h3>
    <div class="post-entry-sidebar">
        <ul>
            @foreach($posts as $post)
            <li>
                <a href="{{route('post', ['slug' => $post->slug])}}">
                    <img src="{{$post->getImage()}}" alt="Image placeholder" class="mr-4">
                    <div class="text">
                        <h4>{{$post->title}}</h4>
                        <div class="post-meta">
                            <span class="mr-2">{{$post->getTime()}}</span>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- END sidebar-box -->

<div class="sidebar-box">
    <h3 class="heading">Categories</h3>
    <ul class="categories">
        @foreach($categories as $category)
        <li><a href="{{route('category', ['slug' => $category->slug])}}">{{$category->title}} <span>({{$category->posts->count()}})</span></a></li>
        @endforeach
    </ul>
</div>
<!-- END sidebar-box -->

<div class="sidebar-box">
    <h3 class="heading">Tags</h3>
    <ul class="tags">
        @foreach($tags as $tag)
        <li><a href="#">{{$tag->title}}</a></li>
        @endforeach
    </ul>
</div>
