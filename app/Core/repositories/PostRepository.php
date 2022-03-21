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
        if (!$category = Post::query()->where('slug', $slug)->where('status', Post::STATUS_ACTIVE)->first()) {
            throw new NotFoundHttpException('Post is not found');
        }
        return $category;
    }

    public function getAllWithCategory($category_id)
    {
        return Post::query()->orderBy('id', 'desc')->where('category_id', $category_id)->with('tags')->paginate(env('PAGINATE'));
    }

    public function getAll()
    {
        return Post::query()->orderBy('id', 'desc')->with('category','tags')->paginate(env('PAGINATE'));
    }

    public static function getPopularPosts()
    {
        return Post::query()->where('status', Post::STATUS_ACTIVE)->orderBy('views', 'desc')->with('category', 'user')->limit(2)->get();
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
