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
        try {
            $tag = $this->tags->getId($id);
            return view('admin.tags.edit', compact('tag'));
        } catch (\DomainException $e) {
            return redirect()->route('tags.index')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->service->edit($id, $request);
        return redirect()->route('tags.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        try {
            $this->service->remove($id);
            return redirect()->route('tags.index')->with('success', 'Тег удален');
        } catch (\DomainException $e) {
            return redirect()->route('tags.index')->with('error', $e->getMessage());
        }
    }

    public function activate($id)
    {
        try {
            $this->service->activate($id);
            return redirect()->route('tags.index')->with('success', 'Тег добавлен на сайт');
        } catch (\DomainException $e) {
            return redirect()->route('tags.index')->with('error', $e->getMessage());
        }
    }

    public function draft($id)
    {
        try {
            $this->service->draft($id);
            return redirect()->route('tags.index')->with('success', 'Тег добавлен в лист ожидания');
        } catch (\DomainException $e) {
            return redirect()->route('tags.index')->with('error', $e->getMessage());
        }
    }
}
