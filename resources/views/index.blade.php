@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
        サービスを利用するには<a href="{{ url('/') }}/login">ログイン</a>が必要です。
    @else
        左のメニューからコンテンツを選択してください。
    @endguest
@endsection
