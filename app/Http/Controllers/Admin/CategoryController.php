<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create','show');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
    public function index()
    {
        return view('admin.categories.index');
    }

    
    public function create()
    {
        $categories= Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);

        $category= Category::create($request->all());
        return redirect()->route('admin.categories.edit'.$category)->width('info','la categoria se creo con exito');
    }

  
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id",
        ]);

        $category->update($request->all());
        return redirect()->route('admin.categories.edit'.$category)->width('info','la categoria se actualizo con exito');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->width('info','la categoria se elimino con exito');
    }
}
