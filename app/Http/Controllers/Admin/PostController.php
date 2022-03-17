<?php

namespace App\Http\Controllers\Admin;

use App\Core\repositories\CategoryRepository;
use App\Core\repositories\PostRepository;
use App\Core\repositories\TagRepository;
use App\Core\services\PostService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    private $posts;
    private $categories;
    private $tags;
    private $service;

    public function __construct(PostRepository $posts, CategoryRepository $categories, TagRepository $tags, PostService $service)
    {
        $this->posts = $posts;
        $this->categories = $categories;
        $this->tags = $tags;
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->posts->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->categories->getAllPlug();
        $tags = $this->tags->getAllPlug();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(StorePost $request)
    {
        $this->service->create($request);
        return redirect()->route('posts.index')->with('success', 'Статья добавлена');
    }

    public function edit($id)
    {
        try {
            $categories = $this->categories->getAllPlug();
            $tags = $this->tags->getAllPlug();
            $post = $this->posts->getId($id);
            return view('admin.posts.edit', compact('categories', 'tags', 'post'));
        } catch (\DomainException $e) {
            return redirect()->route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function update(StorePost $request, $id)
    {
        try {
            $this->service->edit($id, $request);
            return redirect()->route('posts.index')->with('success', 'Изменения сохранены');
        } catch (\DomainException $e) {
            return redirect()->route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->remove($id);
            return redirect()->route('posts.index')->with('success', 'Статья удалена');
        } catch (\DomainException $e) {
            return redirect()->route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function activate($id)
    {
        try {
            $this->service->activate($id);
            return redirect()->route('posts.index')->with('success', 'Статья добавлена на сайт');
        } catch (\DomainException $e) {
            return redirect()->route('posts.index')->with('error', $e->getMessage());
        }
    }

    public function draft($id)
    {
        try {
            $this->service->draft($id);
            return redirect()->route('categories.index')->with('success', 'Статья добавлена в лист ожидания');
        } catch (\DomainException $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }
}
