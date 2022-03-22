<?php

namespace App\Http\Controllers;

use App\Core\repositories\CategoryRepository;
use App\Core\repositories\PostRepository;

class HomeController extends Controller
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $categories = $this->categories->getPopularCategory();
        $popularPosts = PostRepository::getPopularPosts();
        return view('front.index', compact( 'categories', 'popularPosts'));
    }
}
