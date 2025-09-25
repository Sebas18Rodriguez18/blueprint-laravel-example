<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->validated());
        session()->flash('succes','creado exitosamente');
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
      session()->flash('succes','actualizado exitosamente');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('succes','Registro eliminado exitosamente');
        return redirect()->route('categories.index');
    }
}