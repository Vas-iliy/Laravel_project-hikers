<?php

namespace App\Core\repositories;

use App\Models\Post;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostRepository
{
    public function getId($id)
    {
        if (!$category = Post::query()->find($id)) {
            throw new NotFoundHttpException('Category is not found');
        }
        return $category;
    }

    public function getSlug($slug)
    {
        if (!$category = Post::query()->where('slug', $slug)->first()) {
            throw new NotFoundHttpException('Post is not found');
        }
        return $category;
    }

    public function getAll()
    {
        return Post::query()->orderBy('id', 'desc')->with('category', 'tags')->paginate(env('PAGINATE'));
    }

    public function getPopularPosts()
    {
        return Post::query()->orderBy('views', 'desc')->with('category')->limit(3)->get();
    }

    public function remove($post)
    {
        $post->delete();
    }

    public function save($post)
    {
        if (!$return = $post->save()) throw new \RuntimeException('Saving post error.');
        return $return;
    }
}
