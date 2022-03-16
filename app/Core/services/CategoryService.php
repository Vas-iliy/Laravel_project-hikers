<?php


namespace App\Core\services;


use App\Core\repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    public function create(Request $request)
    {
        $category = Category::query()->create($request->all());
        $this->categories->save($category);
        return $category;
    }

    public function edit($id, Request $request)
    {
        $category = Category::query()->update($request->all());
        $this->categories->save($category);
        return $category;
    }

    public function remove($id)
    {
        $category = $this->categories->getId($id);
        $this->categories->remove($category);
    }
}
