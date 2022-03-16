<?php

namespace App\Core\repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getId($id)
    {
        return Category::query()->where('id', $id)->first();
    }

    public function getSlug($slug)
    {
        return Category::query()->where('slug', $slug)->first();
    }

    public function getAll()
    {
        return Category::all();
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
