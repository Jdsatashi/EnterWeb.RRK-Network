<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category){
        $category = Category::all();
        return view('Cate.catelist', compact('category'));
    }
    public function create(Category $category){
        return view('Cate.cate');
    }
    public function store()
    {
        $data = request()->validate([
            'catename' => 'required',
        ]);

        Category::Create([
            'catename' => $data['catename'],
        ]);
        return redirect()->route('cate.list');
    }
    public function destroy(Category $category)
    {
        Category::where('id', $category->id)->DELETE();
        return back();
    }
}
