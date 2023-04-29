@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
        サービスを利用するには<a href="{{ url('/') }}/login">ログイン</a>が必要です。
    @else
        @if (Auth::user()->{'authority'} === 1)
            <p class="h4">DASHBOARD</p>
            <div class="mt-3 mb-5 table-responsive">
                <table class="table table-hover caption-top table-sm">
                    <thead>登録アカウント : {{ $registAccounts->count() . '件' }}</thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">NAME</th>
                        <th scope="row">EMAIL</th>
                        <th scope="row">AUTH</th>
                        <th scope="row">CREATE</th>
                        <th scope="row">UPDATE</th>
                        <th scope="row"></th>
                    </tr>
                    @foreach ($registAccounts as $account)
                        <tr>
                            <td class="text-nowrap">{{ $account->{'id'} }}</td>
                            <td class="text-nowrap">{{ $account->{'name'} }}</td>
                            <td class="text-nowrap">{{ $account->{'email'} }}</td>
                            <td class="text-nowrap">{{ $account->{'authority'} }}</td>
                            <td class="text-nowrap">{{ $account->{'created_at'} }}</td>
                            <td class="text-nowrap">{{ $account->{'updated_at'} }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal" onclick="getRowId(this)">EDIT</button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" onclick="getRowId(this)">DEL</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            {{-- モーダルの設定 --}}
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="ModalLabel">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabel">プロフィール編集</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        </div>
                        <div class="modal-body">
                            <form class="g-3 align-items-center" action="{{ route('admin.accountUpdate') }}" method="post"
                                name="form">
                                @csrf
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th scope="row">ニックネーム</th>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" id="editProfileName" name="name"
                                                        class="form-control" aria-describedby="basic-addon1"
                                                        style="max-width: 250px;" maxlength="64" value="" required>
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
                                                    <input type="text" id="editProfileEmail" name="email"
                                                        class="form-control" aria-describedby="basic-addon1"
                                                        style="max-width: 250px;"
                                                        pattern="^[a-zA-Z0-9_+-]+(.[a-zA-Z0-9_+-]+)*@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$"
                                                        maxlength="256" required>
                                                </div>
                                                @if ($errors->has('email'))
                                                    {{ $errors->first('email') }}
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <input type="hidden" id="editProfileId" name="id" value="">
                                <button class="btn btn-primary float-end">登録</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="ModalLabel">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalLabel">アカウント削除</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                        </div>
                        <div class="modal-body">
                            対象のカウントを削除します
                            <div>ID : <span id="editProfileIdText"></span></div>
                            <div>Name : <span id="editProfileNameText"></span></div>
                            <div>Email: <span id="editProfileEmailText"></span></div>
                            <form class="g-3 align-items-center" action="{{ route('admin.accountDelete') }}" method="post"
                                name="form">
                                @csrf
                                <input type="hidden" id="deleteProfileId" name="id" value="">
                                <button class="btn btn-danger float-end">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 mb-5 table-responsive">
                <table class="table table-hover caption-top table-sm">
                    <thead>登録スコア数</thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">COUNTS</th>
                    </tr>
                    @foreach ($registAccounts as $account)
                        <tr>
                            <td class="text-nowrap">{{ $account->{'id'} }}</td>
                            <td class="text-nowrap">{{ $registScores->where('uid', $account->{'id'})->count() }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    @endguest
@endsection
