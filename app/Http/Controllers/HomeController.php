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
        $categories = $this->categories->getPopularCategory();
        return view('front.home.index', compact( 'categories'));
    }
}
