@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
        サービスを利用するにはログインが必要です。
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
            {{-- パラメータ --}}
            <?php
            if (count($users) === 0) {
                $name = '';
                $email = '';
            } else {
                $name = $users[0]->{'name'};
                $email = $users[0]->{'email'};
            }
            ?>
		<p class="h4">登録情報編集</p>
            <form class="g-3 align-items-center" action="{{ route('account.update') }}" method="post" name="form">
                @csrf
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">ニックネーム</th>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="name" class="form-control" aria-describedby="basic-addon1"
                                        style="max-width: 250px;" placeholder="{{ $name }}" value="{{ $name }}" maxlength="64" required>
                                </div>
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">メールアドレス</th>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="email" class="form-control" aria-describedby="basic-addon1"
                                        style="max-width: 250px;" placeholder="{{ $email }}" value="{{ $email }}" pattern="^[a-zA-Z0-9_+-]+(.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$" maxlength="256" required>
                                </div>
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </td>
                        </tr>
						
                    </tbody>
                </table>
                <button class="btn btn-primary float-end">登録</button>
            </form>
        @endif
    @endguest
@endsection
