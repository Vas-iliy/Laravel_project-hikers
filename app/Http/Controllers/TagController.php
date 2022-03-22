<?php

namespace App\Http\Controllers;

use App\Core\repositories\TagRepository;

class TagController extends Controller
{
    private $tags;

    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    public function tag($slug)
    {
        $tag = $this->tags->getSlug($slug);
        return view('front.tag', compact('tag'));
    }
}
