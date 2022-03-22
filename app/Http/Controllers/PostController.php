<?php

namespace App\Http\Controllers;

use App\Core\repositories\PostRepository;

class PostController extends Controller
{
    private $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function show($slug)
    {
        $post = $this->posts->getSlug($slug);
        return view('front.posts.post', compact('post'));
    }
}
