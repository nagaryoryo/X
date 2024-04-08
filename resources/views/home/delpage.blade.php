@extends('layouts.homeapp')

@section('title','delete')

@section('menuber')
@parent
削除ページ
@endsection

@section('content')
<form action="/home/delpage" method="post">
    <table>
        @csrf
        <input type="hidden" name="message" value="{{$form}}">
        <tr><th>Name: </th><td>{{Auth::user()->name}}</td></tr>
        <tr><th>Message: </th><td>{{$form}}</td></tr>
        <tr><th></th><td><div style="border: 1px solid; width:42px;"><input type="submit" value="send"></div></td></tr>
    </table>
</form>
@endsection

@section('footer')
Ｘつくってみた
@endsection