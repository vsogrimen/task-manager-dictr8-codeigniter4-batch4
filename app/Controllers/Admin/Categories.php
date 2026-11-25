<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\RedirectResponse;

class Categories extends BaseController
{
    public function index(): string
    {
        $categories = model(CategoryModel::class)
            ->select('categories.*')
            ->selectCount('tasks.id', 'task_count')
            ->join('tasks', 'tasks.category_id = categories.id', 'left')
            ->groupBy('categories.id')
            ->orderBy('categories.name')
            ->findAll();

        return view('admin/categories', [
            'title'      => 'Categories',
            'categories' => $categories,
        ]);
    }

    public function create(): RedirectResponse
    {
        $data  = $this->request->getPost(['name']);
        $rules = ['name' => 'required|max_length[50]|is_unique[categories.name]'];

        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput();
        }

        model(CategoryModel::class)->insert($data);

        return redirect()->route('categories')->with('message', 'Category added.');
    }

    public function delete(int $id): RedirectResponse
    {
        model(CategoryModel::class)->delete($id);

        return redirect()->route('categories')
            ->with('message', 'Category deleted.');
    }
}
