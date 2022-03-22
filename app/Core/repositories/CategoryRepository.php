<?php

namespace App\Core\repositories;

use App\Models\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryRepository
{
    public function getId($id)
    {
        if (!$category = Category::query()->where('id', $id)->first()) {
            throw new NotFoundHttpException('Category is not found');
        }
        return $category;
    }

    public function getSlug($slug)
    {
        if (!$category = Category::query()->where('status', Category::STATUS_ACTIVE)->where('slug', $slug)->first()) {
            throw new NotFoundHttpException('Category is not found');
        }
        return $category;
    }

    public function getAll()
    {
        return Category::query()->orderBy('created_at', 'desc')->paginate(env('PAGINATE'));
    }

    public static function getCategories()
    {
        return Category::query()->where('status', Category::STATUS_ACTIVE)->with('posts')->orderBy('created_at', 'desc')->paginate(env('PAGINATE'));
    }

    public function getPopularCategory()
    {
        $categories = Category::query()->with('posts')->limit(3)->get()->sortBy(function ($category) {
            return $category->posts->count();
        });
        return $categories;
    }

    public function getAllPlug()
    {
        return Category::query()->where('status', Category::STATUS_ACTIVE)->pluck('title', 'id')->all();
    }

    public function remove($category)
    {
        $category->status = $category::STATUS_DELETED;
        if (!$category->save()) throw new \RuntimeException('Removing category error.');
    }

    public function save($category)
    {
        if (!$return = $category->save()) throw new \RuntimeException('Saving category error.');
        return $return;
    }
}
