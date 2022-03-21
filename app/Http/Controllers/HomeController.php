<?php

namespace App\Http\Controllers;

use App\Core\repositories\CategoryRepository;

class HomeController extends Controller
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function index()
    {
        $popularCategory = $this->categories->getPopularCategory();
        return view('front.home.index', compact( 'popularCategory'));
    }
}
