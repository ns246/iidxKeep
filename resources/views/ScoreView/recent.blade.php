@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
	サービスを利用するには<a href="{{url('/')}}/login">ログイン</a>が必要です。
    @else
        @include('layouts.scoreview_recent',['param'=>'preset/music_filter/recent.php'])
    @endguest
@endsection



