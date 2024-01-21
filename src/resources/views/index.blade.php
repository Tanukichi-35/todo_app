@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="todo-form__content">
  <div class="todo-form__message">
    {{--
      @if (count($messages) > 0)
      <ul>
        @foreach ($messages->all() as $message)
        <li class="list__messages">{{$message}}</li>
        @endforeach
      </ul>
      @endif
      @if (count($error_messages) > 0)
      <ul>
        @foreach ($error_messages->all() as $error_message)
        <li class="list__error_messages">{{$error_message}}</li>
        @endforeach
      </ul>
      @endif
    --}}


    @if (session('success'))
      <ul>
        <li class="list__messages">{{ session('success') }}</li>
      </ul>
    @elseif (count($errors) > 0)
      <ul>
        @foreach ($errors->all() as $error)
        <li class="list__error_messages">{{$error}}</li>
        @endforeach
      </ul>
    @endif

    {{-- <ul>
      <li class="list__messages">Todoを作成しました</li>
    </ul> --}}
  </div>
  <!--新規作成-->
  <form class="form__create" action="/todos" method="post">
    @csrf
    <h2>新規作成</h2>
    <div class="form__todo">
      <input class="form__todo-input" type="text" name="content" placeholder="Todo" value="{{old ('content')}}" />
      {{-- <input class="form__category-input" type="text" name="category" placeholder="カテゴリ" value="{{$categories[0]->name}}" /> --}}
      <select class="form__category-select" name="category_id">
          @foreach ($categories as $category)
              <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
          @endforeach
      </select>
      <button class="form__todo-create-button" type="submit">作成</button>
    </div>
  </form>
  <!--Todo検索-->
  <form class="form__search" action="/todos/search" method="get">
    @csrf
    <h2>Todo検索</h2>
    <div class="form__todo">
      <input class="form__todo-input" type="text" name="content" placeholder="Todo" value="{{old ('content')}}" />
      {{-- <input class="form__category-input" type="text" name="category" placeholder="カテゴリ" value="{{old ('category')}}" /> --}}
      <select class="form__category-select" name="category_id">
        <option value=""></option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
      </select>
      <button class="form__todo-search-button" type="submit">検索</button>
    </div>
  </form>
  <!--Todoテーブル-->
  <table class="table_show-todo">
    <tr>
      <th class="table_show-todo-column">Todo</th>
      <th class="table_show-category-column">カテゴリ</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($todos as $todo)
    <form class="form" method="post">
    @csrf
      <tr>
        <td>
          <input name="id" type="hidden" value="{{$todo['id']}}">
          <input class="form__todo-input" type="text" name="content" value="{{$todo['content']}}"/>
          {{-- {{$todo->getContent()}} --}}
        </td>
        <td>
          {{-- <input class="form__category-input" type="text" name="name" value="{{$categories[$todo->category_id - 1]->name}}"/> --}}
          <select class="form__category-select" name="category_id">
              @foreach ($categories as $category)
                  <option value="{{ $category['id'] }}" @if($todo['category_id'] == $category['id']) selected @endif>{{ $category['name'] }}</option>
              @endforeach
          </select>
          {{-- <input class="form__category-input" type="text" name="name" value="{{$categories[$todo->category_id]->name}}"/> --}}
          {{-- {{$todo->getContent()}} --}}
        </td>
        <td>
          <button class="table__button update" formaction= "/todos/update">更新</button>
          {{-- <button class="table__button update" formaction= {{$todo->getEditURL()}}>更新</button> --}}
        </td>
        <td>
          <button class="table__button delete" formaction= "/todos/delete">削除</button>
          {{-- <button class="table__button delete" formaction= {{$todo->getDeleteURL()}}>削除</button> --}}
        </td>
      </tr>
    </form>
    @endforeach
  </table>
</div>
@endsection