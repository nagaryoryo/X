<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function index(Request $request){
        $items = DB::select('select * from people');
        $reply = DB::select('select * from reply');
        $follow = DB::table('follow')->get();
        $me = Auth::user();
        $replymessage = [];
        foreach ($items as $item) {
            foreach ($reply as $replyItem) {
                if($item->id == $replyItem->receive){
                    $replymessage[$item->id] = $replyItem->reply;
                }
            }
        }
        return view('home.index', compact('items', 'replymessage', 'reply' , 'me','follow'));
    }
    
    public function post(Request $request){
        $items = DB::select('select * from people');
        $reply = DB::select('select * from reply');
        return view('home.index', compact('items', 'replymessage', 'reply'));
    }

    public function message(Request $request, $id){
        $message = DB::table('people')->where('id', $id)->first();
        $reply = DB::table('reply')->get();
        $follow = DB::table('follow')->get();
        $me = Auth::user();
        $replymessage = [];
    
        foreach ($reply as $replyItem) {
            if ($message && $replyItem->receive == $message->id) {
                $replymessage[$message->id] = $replyItem->reply;
            }
        }
        $items = DB::table('people')->get();
    
        return view('home.message', compact('message', 'replymessage', 'reply', 'me', 'follow', 'items'));
    }
    

    public function messagepost(Request $request){
        return redirect()->route('home.message');
    }

    public function follow($meName, $itemName)
    {
        $me = User::where('name', $meName)->firstOrFail(); 
        $item = User::where('name', $itemName)->firstOrFail();
        DB::table('follow')->insert([
            'name' => $me->name,
            'follower' => $item->name
        ]);
        return redirect()->route('home');
    }

    public function unfollow($meName, $itemName)
    {
        $me = User::where('name', $meName)->firstOrFail(); 
        $item = User::where('name', $itemName)->firstOrFail(); 
        DB::table('follow')
            ->where('name', $me->name)
            ->where('follower', $item->name)
            ->delete();

        return redirect()->route('home');
    }
    
    public function add(Request $request){
        return view('home.add');
    }

    public function create(Request $request){
        $param=[
            'name'=>Auth::user()->name,
            'message'=>$request->message,
            'good' =>0,
        ];
        DB::insert('insert into people ( name, message,good) values ( :name, :message, :good)',$param);
        return redirect()->route('home');
    }

    public function del(Request $request){
        $userName =Auth::user()->name;
        $item = DB::table('people')->where('name', $userName)->get();
        if($item != null){return view('home.del',['message' => $item]);}
        else{return redirect()->route('home.no');}
    }

    public function delpost(Request $request){
        $message = $request->input('message');
        return redirect()->route('home.delpage',['message' => $message]);
    } 

    public function delpage(Request $request)
    {
        $userName = Auth::user()->name;
        $item = $request->input('message');
        $message = DB::table('people')->where('id', $item)->value('message');
        if($item != null){
        return view('home.delpage', ['form' => $message]);
        }else{
            return  redirect()->route('home.noo');
        }
    }

    public function remove(Request $request){
        $id_message = $request->input('message');
        DB::table('people')->where('message', $id_message)->delete();
        return redirect()->route('home');
    }
    
    public function no(){
        return view('home.no');
    }

    public function noo(){
        return view('home.noo');
    }

    public function reply(Request $request,$id){
        $item = DB::table('people')->find($id);
        return view('home.reply',['item'=>$item]);
    }

    public function replypost(Request $request,$id){
        $item = DB::table('people')->find($id);
        if ($item) {
            $receive = $item->id; 
            $name = Auth::user()->name;
            $reply = $request->message;
    
            $param=[
                'receive' => $receive,
                'name' => $name,
                'reply' => $reply,
            ];
            DB::table('reply')->insert($param);
        }
        return redirect()->route('home');
    }

    public function homesite(Request $request, $name){
        $me = Auth::user();
        $item = DB::table('people')->where('name', $name)->get();
        $follow = DB::table('follow')->where('name', $name)->count();
        $follower = DB::table('follow')->where('follower', $name)->count();
        return view('home.site',['me'=> $me,'name' => $name,'message' =>$item,'follow'=>$follow,'follower'=>$follower]);
    }
    
    public function posthomesite(Request $request, $name){
        $item = DB::table('people')->where('name', $name)->get();
        if(Auth::user() == $item)
            return redirect()->route('home.site');
    }    

    public function edit(Request $request)
    {
        $userName =Auth::user()->name;
        $item = DB::table('people')->where('name', $userName)->get();
        if($item != null){return view('home.edit',['message' => $item]);}
        else{return redirect()->route('home.no');}
    }

    public function editpost(Request $request)
    {
        $message = $request->input('message');
        return redirect()->route('home.update',['message' => $message]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $userName = Auth::user()->name;
        $item = $request->input('message');
        $message = DB::table('people')->where('id', $item)->value('message');
        if($item != null){
        return view('home.update', ['form' => $message]);
        }else{
            return  redirect()->route('home.noo');
        }
    }

    public function updatepost(Request $request){
        $id = $request->input('id');
        $message = $request->input('message');
        $param = [
            'id' => $id,
            'message' => $message,
            'name' => Auth::user()->name,
        ];
        DB::update('update people set name=:name,message=:message where id=:id',$param);
        return redirect()->route('home');
    }
    
    public function good($id){
        $item = DB::table('people')->where('id',$id)->first();
        if($item){
            $good = $item->good;
            $good++;
            DB::table('people')->where('id', $id)->update(['good' => $good]);
    }
        return redirect()->route('home');
    }
    
    public function search(Request $request) {
        $query = $request->input('query');
        $me = Auth::user();
        $items = DB::table('people')->where('name', 'like', "%$query%")->get();
        return view('home.index', compact('items','me'));
    }    

}