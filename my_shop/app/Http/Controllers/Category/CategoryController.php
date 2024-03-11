<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index', ['categories' => Category::query()->paginate(5)]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(StoreRequest $request)
    {
        $dataCategory = $request->validated();
        Category::query()->firstOrCreate(['title' => mb_strtolower($dataCategory['title'])]);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category = $category->update($request->validated());
        return redirect()->route('categories.index');
    }
    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
