@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="todo-form__content">
  <div class="todo-form__message">
    <ul>
      <li>Todoを作成しました</li>
    </ul>
  </div>
  <form class="form" action="/todos" method="post">
    @csrf
    <div class="form__todo">
      <input class="form__todo-input" type="text" name="content" placeholder="パンを買う" value="{{old ('content')}}" />
      <button class="form__todo-button" type="submit">作成</button>
    </div>
  </form>
  <table class="table_show-todo">
    <tr>
      <th class="table_show-todo-column">Todo</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($todos as $todo)
    <tr>
      <td>
        {{$todo->get()}}
      </td>
      <td>
        <button class="table__button update">更新</button>
      </td>
      <td>
        <button class="table__button delete">削除</button>
      </td>
    </tr>
    @endforeach
  </table>  
</div>
@endsection