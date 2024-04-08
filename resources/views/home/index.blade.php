@extends('layouts.homeapp')

@section('title','Home')

@section('menuber')

@endsection

<style>
.horizontal-line {
    border-bottom: 1px solid black;
}
td{
    font-size: 15px;
}
.border{border:1px solid black;font-size: 0.8rem;}
input{font-size:8px;}
.font{ font-size: 8px !important;
    padding: 0.05rem !important;
    border:1px solid black;
}
</style>

@section('content')
<form action="{{ route('home.search') }}" method="GET">
    <input  class="font" type="text" name="query" placeholder="検索キーワードを入力">
    <button class="border" type="submit">検索</button>
</form>
<br><hr><hr>
@foreach($items as $item)
<table>
   <tr>
        <td><br><a href="/home/site/{{$item->name}}" style="text-decoration: underline; font-weight:bold;" >{{$item->name}}</a>
        @if(Auth::check() && $me->name !== $item->name)
        &nbsp; 
            @if($me && DB::table('follow')->where('name', $me->name)->where('follower', $item->name)->exists())
            <a href="/home/unfollow/{{$me->name}}/{{$item->name}}" style="text-decoration: underline;">フォロー中</a>
            @else
            <a href="/home/follow/{{$me->name}}/{{$item->name}}" style="text-decoration: underline;">フォローする</a>
            @endif
        @endif
        <br>
        </td>
    </tr>
</table>
<div style="font-size: 5px;"><br></div>
{{$item->message}}<br><div style="font-size: 8px;"><br></div>
<a href="/home/reply/{{$item->id}}" style="border: 1px solid; width:42px; text-align: center;">返信</a>
    @if(isset($replymessage[$item->id]))
        <a href="/home/message/{{$item->id}}">←返信があります</a> 
    @endif&nbsp; &nbsp; &nbsp;  
    @if($item->name != Auth::user()->name)
        <a href="/home/good/{{$item->id}}" style="text-decoration: underline;">いいね数</a>  
    @else
        <a style="text-decoration: underline;">いいね数</a>
    @endif
    :{{$item->good}}
    <br><br>
    <hr><hr><hr><hr>
@endforeach
@endsection

@section('footer')
Ｘつくってみた
@endsection