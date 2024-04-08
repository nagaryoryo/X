@extends('layouts.homeapp')

@section('title','reply')

@section('menuber')
@parent
返信ページ
@endsection

@section('content')
@parent
<form action="/home/reply/{{$item->id}}" method="post">
   @csrf
    <table>
    <td><br>{{$item->name}}</br></td>
    <td><br>{{$item->message}}</br></td>
    <tr><th>返信: </th><td><input type="text" name="message"></td></tr>
    <tr><th></th><td><div style="border: 1px solid; width:42px;"><input type="submit" value="send"></div></td></tr>
    </td>
    </table>
</form>
@endsection

@section('footer')
Ｘつくってみた
@endsection