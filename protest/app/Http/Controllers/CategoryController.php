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
    public function destroy($id)
    {
        $cate = Category::find($id);

        if ($cate) {
            $cate->delete();
            return redirect('/category/list')->with('message', 'Category Deleted');
        }
        else{
            return back()->with('message', 'Something went wrong, please try again');
        }
    }
}
