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
        $category = Category::query()->find($id)->update($request->all());
        return $category;
    }

    public function activate($id)
    {
        $category = $this->categories->getId($id);
        $category->activate();
        $this->categories->save($category);
    }

    public function draft($id)
    {
        $category = $this->categories->getId($id);
        $category->draft();
        $this->categories->save($category);
    }

    public function remove($id)
    {
        $category = $this->categories->getId($id);
        if ($category->posts->count()) {
            throw new \DomainException('Ошибка, у категории есть записи');
        }
        $this->categories->remove($category);
    }
}
