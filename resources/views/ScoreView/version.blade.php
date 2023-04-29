@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
        サービスを利用するにはログインが必要です。
    @else
        @include('layouts.scoreview_version',['param'=>'preset/music_filter/lv.php'])
    @endguest
@endsection



