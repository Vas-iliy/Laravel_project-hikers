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
        $data = $request->all();

        $data['image'] = ImageService::uploadImagePost($request);

        $post = Post::query()->create($data);
        $post->tags()->sync($request->tags);
    }

    public function edit($id, StorePost $request)
    {
        $post = $this->posts->getId($id);
        $data = $request->all();
        if ($file = ImageService::uploadImagePost($request, $post->image)) {
            $data['image'] = $file;
        }
        $post->update($data);
        $post->tags()->sync($request->tags);
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
        $post->tags()->sync([]);
        ImageService::deleteImage($post->image);
        $this->posts->remove($post);
    }
}
