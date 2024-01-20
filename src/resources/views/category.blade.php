@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/category.css') }}" />
@endsection

@section('content')
<div class="category-form__content">
  <div class="category-form__message">
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
  </div>
  <!--新規作成-->
  <form class="form__create" action="/categories" method="post">
    @csrf
    <div class="form__category">
      <input class="form__category-input" type="text" name="name" placeholder="カテゴリ" value="{{old ('name')}}" />
      <button class="form__category-create-button" type="submit">作成</button>
    </div>
  </form>
  <!--カテゴリテーブル-->
  <table class="table_show-category">
    <tr>
      <th class="table_show-category-column">カテゴリ</th>
      <th></th>
      <th></th>
    </tr>
    @foreach ($categories as $category)
    <form class="form" method="post">
    @csrf
      <tr>
        <td>
          <input name="id" type="hidden" value="{{$category['id']}}">
          <input class="form__category-input" type="text" name="name" value="{{$category['name']}}"/>
          {{-- {{$category->getContent()}} --}}
        </td>
        <td>
          <button class="table__button update" formaction= "/categories/update">更新</button>
        </td>
        <td>
          <button class="table__button delete" formaction= "/categories/delete">削除</button>
        </td>
      </tr>
    </form>
    @endforeach
  </table>
</div>
@endsection