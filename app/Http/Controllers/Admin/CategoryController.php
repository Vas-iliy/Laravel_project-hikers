<?php

namespace App\Http\Controllers\Admin;

use App\Core\repositories\CategoryRepository;
use App\Core\services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categories;
    private $service;

    public function __construct(CategoryRepository $categories, CategoryService $service)
    {
        $this->categories = $categories;
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->categories->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->service->create($request);
        return redirect()->route('categories.index')->with('success', 'Категория добавлена');
    }

    public function edit($id)
    {
        try {
            $category = $this->categories->getId($id);
            return view('admin.categories.edit', compact('category'));
        } catch (\DomainException $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $this->service->edit($id, $request);
        return redirect()->route('categories.index')->with('success', 'Изменения сохранены');
    }

    public function destroy($id)
    {
        try {
            $this->service->remove($id);
            return redirect()->route('categories.index')->with('success', 'Категория удалена');
        } catch (\DomainException $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }

    public function activate($id)
    {
        try {
            $this->service->activate($id);
            return redirect()->route('categories.index')->with('success', 'Категория добавлена на сайт');
        } catch (\DomainException $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }

    public function draft($id)
    {
        try {
            $this->service->draft($id);
            return redirect()->route('categories.index')->with('success', 'Категория добавлена в лист ожидания');
        } catch (\DomainException $e) {
            return redirect()->route('categories.index')->with('error', $e->getMessage());
        }
    }
}
