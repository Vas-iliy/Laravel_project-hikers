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
        if (!$category = Category::query()->where('slug', $slug)->first()) {
            throw new NotFoundHttpException('Category is not found');
        }
        return $category;
    }

    public function getAll()
    {
        return Category::query()->orderBy('created_at', 'desc')->paginate(env('PAGINATE'));
    }

    public function getPopularCategory()
    {
        return Category::query()->selectRaw('categories.id,
            (SELECT COUNT(posts.id) FROM posts WHERE post.category_id = category.id) AS COUNT_POSTS')
            ->orderBy('COUNT_POSTS', 'DESC')->limit(3)->get();
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
