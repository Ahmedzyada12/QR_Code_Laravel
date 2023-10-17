<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories=Category::all();
        // $posts=Post::all();
        return view('admin\index' , compact('categories'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',//1
        ]);

        $category= new Category;
        $category->name= $request->name; //2 insert
        $category->save();

        return redirect()->route('admin.index')->with('success','Category insert');

    }

    public function edit(Category $category)
    {
        return view('admin.edit' , compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('admin.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.index');
    }

    public function trashedc()
    {
        $categories=Category::onlyTrashed()->get();
        return view('admin.trashed' , compact('categories'));
    }


    public function backdelc($id)
    {
        $categories=Category::onlyTrashed()->where('id',$id)->restore();

        return redirect()->route('admin.index')->with('success','Category back');
    }

    public function hdeletec($id)
    {
        $categories=Category::onlyTrashed()->where('id',$id)->forceDelete();

        return redirect()->route('admin.index')->with('success','Category is deleted');
    }


}
