@extends('layouts.homeapp')

@section('title','add')

@section('menuber')
@parent
追加ページです。
@endsection

@section('content')
<form action="/home/add" method="post">
    <table>
        @csrf
        <tr><th>Message: </th><td><input type="text" name="message"></td></tr>
        <tr><th></th><td>
            <div style="border: 1px solid; width:42px;"><input type="submit" value="send"></div></td></tr>
    </table>
</form>
@endsection

@section('footer')
Ｘつくってみた
@endsection