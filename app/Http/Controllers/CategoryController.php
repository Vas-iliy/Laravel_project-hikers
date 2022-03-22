<?php

namespace App\Http\Controllers;

use App\Core\repositories\CategoryRepository;
use App\Core\repositories\PostRepository;

class CategoryController extends Controller
{
    private $categories;
    private $posts;

    public function __construct(CategoryRepository $categories, PostRepository $posts)
    {
        $this->categories = $categories;
        $this->posts = $posts;
    }

    public function category($slug)
    {
        $category = $this->categories->getSlug($slug);
        $posts = $this->posts->getAllWithCategory($category->id);
        return view('front.category', compact('category', 'posts'));
    }
}
