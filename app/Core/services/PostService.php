<?php

namespace App\Core\services;

use App\Core\repositories\PostRepository;
use App\Http\Requests\StorePost;
use App\Models\Post;

class PostService
{
    private $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function create(StorePost $request)
    {
        $post = Post::query()->create($request->all());
        $this->posts->save($post);
        return $post;
    }

    public function edit($id, StorePost $request)
    {
        $post = Post::query()->find($id)->update($request->all());
        return $post;
    }

    public function activate($id)
    {
        $post = $this->posts->getId($id);
        $post->activate();
        $this->posts->save($post);
    }

    public function draft($id)
    {
        $post = $this->posts->getId($id);
        $post->draft();
        $this->posts->save($post);
    }

    public function remove($id)
    {
        $post = $this->posts->getId($id);
        if ($post->posts->count()) {
            throw new \DomainException('Ошибка, у категории есть записи');
        }
        $this->posts->remove($post);
    }
}
