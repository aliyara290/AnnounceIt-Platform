<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(8);
        return view('dashboard.categories', compact('categories'));
    }
    public function create() {
        return view('dashboard.create');
    }
    public function store(Request $request){
        $name = $request->input('name');
        $slug = Str::slug($name, '-');
        $newCategory = Category::create([
            'name' => $name,
            'slug' => $slug,
        ]);
        return redirect()->route('dashboard.categories')->with('success', 'Category created successfully!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('dashboard.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $name = $request->input('u-name');
        $slug = Str::slug($name, '-');
        $category->name = $name;
        $category->slug = $slug;
        $category->save();

        return redirect()->route('dashboard.categories')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('dashboard.categories')->with('success', 'Category deleted successfully!');
    }
}
