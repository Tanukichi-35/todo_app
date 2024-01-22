<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request){
        $todo = $request->all();
        // dd($todo);s
        Todo::create($todo);
        return redirect('/')->with('success','Todoを作成しました');
    }

    public function update(Request $request){
        // $todo = Todo::find($request->id);
        // dd($todo);
        // $todo['content'] = $request->content;
        // unset($todo['_token']); // csrf対策用のトークンを削除
        // Todo::find($request->id)->update($todo); // idを指定、レコードを取得し、更新
        // return redirect('/');

        $todo = Todo::find($request->id);
        // dd($todo);
        $todo->update([  
            "content" => $request->content,
            "category_id" => $request->category_id,
        ]); 
        return redirect('/')->with('success','Todoを更新しました');;
    }

    public function destroy(Request $request){
        // $todo = Todo::find($id);
        // dd($todo);
        // unset($todo['_token']); // csrf対策用のトークンを削除
        // Todo::find($request->id)->update($todo); // idを指定、レコードを取得し、更新
        // return redirect('/');

        $todo = Todo::find($request->id);
        // dd($todo);
        $todo->delete(); 
        return redirect('/')->with('success','Todoを削除しました');;
    }

    public function search(Request $request){
        // $todos = Todo::with('category');
        // if(!empty($request->category_id)) {     //入力欄が空ではない場合、検索処理を実行
        //     $todos = $todos->where('category_id', '=', $request->category_id);
        //     if(!empty($request->content)) {         //入力欄が空ではない場合、検索処理を実行
        //         $todos = $todos->where('content', 'LIKE', "%{$request->content}%");
        //     }
        // }
        // $todos = $todos->get();
        // dd($todos);

        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->content)->get();
        $categories = Category::all();
        // dd($request->content);

        return view('index', compact('todos', 'categories'));
    }
}
