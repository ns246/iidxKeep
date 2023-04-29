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
		<p class="h4">DJ DATA</p>
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th scope="row">DJ NAME</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'dj_name'} !== '')
                                {{ $djdata->{'dj_name'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">所属エリア</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'area_id'} !== '')
                                {{ $djdata->{'area_id'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">IIDX ID</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'iidx_id'} !== '')
                                {{ $djdata->{'iidx_id'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">プレイカウント</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'playcount'} !== '')
                                {{ $djdata->{'playcount'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">段位(SP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'class_id_sp'} !== '')
                                {{ $djdata->{'class_id_sp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">段位(DP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'class_id_dp'} !== '')
                                {{ $djdata->{'class_id_dp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">DJ POINT(SP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'djp_sp'} !== '')
                                {{ $djdata->{'djp_sp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">DJ POINT(DP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'djp_dp'} !== '')
                                {{ $djdata->{'djp_dp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">アリーナクラス(SP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'arena_class_sp'} !== '')
                                {{ $djdata->{'arena_class_sp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">アリーナクラス(DP)</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'arena_class_dp'} !== '')
                                {{ $djdata->{'arena_class_dp'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">更新日</th>
                        <td>
                            @if (is_null($djdata))
                                ---
                            @elseif ($djdata->{'updated_at'} !== '')
                                {{ $djdata->{'updated_at'} }}
                            @else
                                ---
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            @if (isset($djdata->{'dj_name'}))
                <button type="button" class="btn btn-primary" onclick="location.href='{{ route('import') }}'">スコアデータ
                    インポート(CSV)</button>
            @else
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('import') }}'"
                    disabled>スコアデータ
                    インポート(CSV)</button>
            @endif
            <button type="button" class="btn btn-primary float-end"
                onclick="location.href='{{ route('profile.edit') }}'">編集</button>

            @if (!isset($djdata->{'dj_name'}))
                <div>スコアのインポートはIIDX IDの登録が必要です。</div>
            @endif
        @endif
    @endguest
@endsection
