@extends('layouts.homeapp')

@section('title','no')

@section('menuber')
@parent
削除ページ
@endsection

@section('content')
@parent
何もありません。<br>
<x-nav-link :href="route('home')" :active="request()->routeIs('home')">
             {{ __('ホームに戻る') }}
</x-nav-link>
@endsection

@section('footer')
Ｘつくってみた
@endsection