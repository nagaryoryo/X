@extends('layouts.homeapp')

@section('title','home.{name}')

@section('menuber')
@parent
個人ページ
@endsection

<style>
.horizontal-line {
    border-bottom: 1px solid black;
}
td{
    font-size: 15px;
}
.border{border:1px solid black;}

</style>

@section('content')
<table class="border">
    <tr>
        <td>
            <br>
            <a>　</a>
            <a href="/home/site/{{$name}}" style="text-decoration: underline; font-weight:bold;" >{{$name}}</a>
            <a>　</a>
            <a>follow:{{$follow}}</a>
            <a>　</a>
            <a>follower:{{$follower}}</a>
            @if(Auth::check() && $me->name !== $message->first()->name)
                &nbsp; 
                @if($me && DB::table('follow')->where('name', $me->name)->where('follower', $message->first()->name)->exists())
                    <a href="/home/unfollow/{{$me->name}}/{{$message->first()->name}}" style="text-decoration: underline;">フォロー中</a>
                @else
                    <a href="/home/follow/{{$me->name}}/{{$message->first()->name}}" style="text-decoration: underline;">フォローする</a>
                @endif
            @endif
            <a>　</a>
            <br><br>
        </td>
    </tr>
</table><br><hr><hr><hr><table>
    @foreach($message as $item)
    <tr>
        <td><br>
            <a href="/home/site/{{$item->name}}" style="text-decoration: underline; font-size: 15px;">{{$item->name}}</a>
            <br><br>
            {{$item->message}}
            <br><br>
            <a href="/home/reply/{{$item->id}}" style="border: 1px solid; width:42px; text-align: center;">返信</a>
            @if(isset($replymessage[$item->id]))
                <a href="/home/message/{{$item->id}}">←返信があります</a> 
            @endif
            &nbsp; &nbsp; &nbsp;  
            @if($item->name != Auth::user()->name)
                <a href="/home/good/{{$item->id}}" style="text-decoration: underline;">いいね数</a>  
            @else
                <a style="text-decoration: underline;">いいね数</a>
            @endif
            :{{$item->good}}
            <br><br><hr><hr>&nbsp; &nbsp;
        </td>
    </tr>
    @endforeach
</table>
@endsection


@section('footer')
Ｘつくってみた
@endsection