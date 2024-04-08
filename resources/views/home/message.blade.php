@extends('layouts.homeapp')



@section('content')
<form action="/home/message" method="post">
    <table>
        <tr>
            <td>{{$message->message}}</td>
        </tr>
        <td></td>
        <tr>
            @foreach($items as $item)
            <td>
                @if(isset($replymessage[$item->id]))
                    @foreach($reply as $replyItem)
                        @if($replyItem->receive == $item->id)
                            <a href="/home/site/{{$replyItem->name}}" style="text-decoration: underline;">{{$replyItem->name}}</a>
                            <a>:{{$replyItem->reply}}</a>
                            <br>
                        @endif
                    @endforeach
                @endif
            </td>
            @endforeach
        </tr>
    </table>
</form>
@endsection

