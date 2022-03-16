<?php

namespace App\Http\Controllers\Admin;

use App\Core\repositories\TagRepository;
use App\Core\services\TagService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tags;
    private $service;

    public function __construct(TagRepository $tags, TagService $service)
    {
        $this->tags = $tags;
        $this->service = $service;
    }

    public function index()
    {
        $tags = $this->tags->getAll();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $this->service->create($request);
        return redirect()->route('tags.index')->with('success', 'Тег добавлен');
    }

    public function edit($id)
    {
        $tag = $this->tags->getId($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->service->edit($id, $request);
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        $this->service->remove($id);
        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }

    public function activate($id)
    {
        $this->service->activate($id);
        return redirect()->route('tags.index')->with('success', 'Тег добавлен на сайт');
    }

    public function draft($id)
    {
        $this->service->draft($id);
        return redirect()->route('tags.index')->with('success', 'Тег добавлен в лист ожидания');
    }
}
