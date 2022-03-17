<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->with('category', 'tags')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::query()->pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePost $request)
    {
        $data = $request->all();

        $data['image'] = Post::uploadImage($request);

        $post = Post::query()->create($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        $categories = Category::query()->pluck('title', 'id')->all();
        $tags = Tag::query()->pluck('title', 'id')->all();
        $post = Post::query()->find($id);
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(StorePost $request, $id)
    {
        $post = Post::query()->find($id);
        $data = $request->all();
        if ($file = Post::uploadImage($request, $post->image)) {
            $data['image'] = $file;
        }
        $post->update($data);
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $post = Post::query()->find($id);
        $post->tags()->sync([]);
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Статья удалена');
    }
}
