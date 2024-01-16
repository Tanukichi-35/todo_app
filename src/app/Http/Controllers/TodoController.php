<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request){
        $todo = $request->all();
        // dd($todo);
        Todo::create($todo);
        return redirect('/')->with('success','Todoを作成しました');
    }
}
