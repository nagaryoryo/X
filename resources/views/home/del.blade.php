@extends('layouts.homeapp')

@section('title','delete')

@section('menuber')
@parent
削除ページです。
@endsection

@section('content')
<form action="/home/del" method="post">
@csrf
    <table>
    @foreach($message as $item)
        <td>{{$item->message}}</td>
        <tr><td> <input type="hidden" name="message" value="{{$item->id}}">
            <div style="border: 1px solid; width:42px;"><input type="submit" value="削除"></div></td></tr>
    @endforeach
    </table>
</form>
@endsection

@section('footer')
Ｘつくってみた
@endsection