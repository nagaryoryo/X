@extends('layouts.helloapp')

@section('title','Hello')

@section('menuber')
@endsection

@section('content')
@if (Auth::check())
<p>USER: {{$user->name . '(' . $user->id . ')'}}</p>
@else
<p>※ログインしていません。(<a href="/login">ログイン</a>|<a href="/register">登録</a>)</p>
@endif
<table></table>
@endsection

@section('footer')
    Ｘつくってみた。
@endsection