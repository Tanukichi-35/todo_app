<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $category = $request->all();
        Category::create($category);
        return redirect('/categories')->with('success','カテゴリを作成しました');
    }

    public function update(Request $request){

        $category = Category::find($request->id);
        // dd($request);
        $category->update([  
            "name" => $request->name,
        ]); 
        return redirect('/categories')->with('success','カテゴリを更新しました');;
    }

    public function destroy(Request $request){

        $category = Category::find($request->id);
        $category->delete(); 
        return redirect('/categories')->with('success','カテゴリを削除しました');;
    }
}
