@extends('layouts.bootstrap')

<h2>依頼検索画面</h2>

<form action="/content/find" method="post">
@csrf
<input type="text" name="title" value="{{$title}}" placeholder="タイトル">
<input type="text" name="address_first" value="{{$address_first}}" placeholder="都道府県">
<input type="number" name="price" value="{{$price}}" placeholder="報酬">
<input type="submit" value="検索"> 
</form>

{{ Auth::user()->name }}がログインしてます
@foreach($items as $item)
<table>
<tr>
        <td>{{$item->title}}</td>
        <td>{{$item->address_first}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{DB::table('content_items')->where('content_id','=',$item->id)->count()}}</td>
<tr>
</table>
@endforeach

<button type="button" class="btn btn-success"><a href="{{ action('ContentsController@create') }}">依頼作成</a></button>