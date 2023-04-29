@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
	サービスを利用するには<a href="{{url('/')}}/login">ログイン</a>が必要です。
    @else
        @isset($error)
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ $error }}
                </div>
            </div>
        @endisset

        @if (Auth::id() > 0)
		<p class="h4">登録情報</p>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th scope="row">ニックネーム</th>
                        <td>
                            @if (is_null($users))
                                ---
                            @elseif ($users->{'name'} !== '')
                                {{ $users->{'name'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">メールアドレス</th>
                        <td>
                            @if (is_null($users))
                                ---
                            @elseif ($users->{'email'} !== '')
                                {{ $users->{'email'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">登録日</th>
                        <td>
                            @if (is_null($users))
                                ---
                            @elseif ($users->{'created_at'} !== '')
                                {{ $users->{'created_at'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary float-end"
                onclick="location.href='{{ route('account.edit') }}'">編集</button>
        @endif
    @endguest
@endsection
