@extends('layouts.common')
@section('title', 'iidxKeep')
@section('description', 'iidxKeep')
@include('layouts.header')
@include('layouts.submenu')
@section('content')
    @guest
	サービスを利用するには<a href="{{url('/')}}/login">ログイン</a>が必要です。
    @else
        @if (Auth::id() > 0)
            <label for="formFile" class="form-label">公式サイトから出力したスコアデータCSVを選択してください。<br>現在、シングルプレーのみ対応しています。</label>
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <form action="{{ route('scoreimport') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="csvdata" class="form-control" id="formFile" accept=".csv"
                                required="required">
                            <input type="hidden" name="id" value="{{ Auth::id() }}">
                            <input type="hidden" name="iidx_id" value="{{ $djdata->{'iidx_id'} }}">
                    </div>
                    <div class="col-sm">
                        <button class="btn btn-primary">送信</button>
                        </form>
                    </div>
                </div>
                <div class="mt-2">
                    <a class="" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#csvDownload">CSVダウンロード手順</a>
                </div>
                {{-- モーダルの設定 --}}
                <div class="modal fade" id="csvDownload" tabindex="-1" aria-labelledby="ModalLabel">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ModalLabel">CSVダウンロード手順</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                            </div>
                            <div class="modal-body">
                                <p>STEP1: <a href="https://www.konami.com/amusement/video/bm2dx/" target="_blank" rel="noopener noreferrer">beatmaniaIIDX
                                        GATEWAY</a>へアクセスし、アーケード版の公式サイトへアクセスする。<br>
                                <img src="{{ url('/') }}/images/score_import/step1.jpg"></p>
                                <p>STEP2: メニューから[DJ DATA] > [スコアデータCSVダウンロード] へ進む。<br>
                                <img src="{{ url('/') }}/images/score_import/step2.jpg"></p>
                                <p>STEP3: [SP] をクリックする。<br>
                                <img src="{{ url('/') }}/images/score_import/step3.jpg"></p>
                                <p>STEP4: [ダウンロード] をクリックする。<br>
                                <img src="{{ url('/') }}/images/score_import/step4.jpg"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- バリデーションエラー表示 --}}
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            {{ $error }}
                        </div>
                    </div>
                @endforeach
                {{-- フォーマットが正しくない --}}
                @if ($res == 1)
                    <div class="alert alert-danger d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            スコアデータのフォーマットが正しくありません。
                        </div>
                    </div>
                @endif
                {{-- インポート成功 --}}
                @if ($res === '0' && $c >= 1)
                    <div class="alert alert-success d-flex align-items-center mt-4" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            インポートに成功しました。
                        </div>
                    </div>
                @endif
            </div>
            @if ($res === '0' && $c >= 1)
                <div class="mt-5 mb-5 table-responsive">
                    {{ $c }}件登録しました。
                    <table class="table table-hover caption-top table-sm table_sticky">
                        <thead>
                            <tr>
                                <th scope="row" class="table-secondary">TITLE</th>
                                <th scope="row" class="table-secondary">GENRE</th>
                                <th scope="row" class="table-secondary">ARTIST</th>
                                <th scope="row" class="table-secondary">PLAY COUNT</th>
                                <th scope="row" class="table-success">CLEAR TYPE(B)</th>
                                <th scope="row" class="table-success">DJ LEVEL(B)</th>
                                <th scope="row" class="table-success">SCORE(B)</th>
                                <th scope="row" class="table-success">PGREAT(B)</th>
                                <th scope="row" class="table-success">GREAT(B)</th>
                                <th scope="row" class="table-success">BP(B)</th>
                                <th scope="row" class="table-info">CLEAR TYPE(N)</th>
                                <th scope="row" class="table-info">DJ LEVEL(N)</th>
                                <th scope="row" class="table-info">SCORE(N)</th>
                                <th scope="row" class="table-info">PGREAT(N)</th>
                                <th scope="row" class="table-info">GREAT(N)</th>
                                <th scope="row" class="table-info">BP(N)</th>
                                <th scope="row" class="table-warning">CLEAR TYPE(H)</th>
                                <th scope="row" class="table-warning">DJ LEVEL(H)</th>
                                <th scope="row" class="table-warning">SCORE(H)</th>
                                <th scope="row" class="table-warning">PGREAT(H)</th>
                                <th scope="row" class="table-warning">GREAT(H)</th>
                                <th scope="row" class="table-warning">BP(H)</th>
                                <th scope="row" class="table-danger">CLEAR TYPE(A)</th>
                                <th scope="row" class="table-danger">DJ LEVEL(A)</th>
                                <th scope="row" class="table-danger">SCORE(A)</th>
                                <th scope="row" class="table-danger">PGREAT(A)</th>
                                <th scope="row" class="table-danger">GREAT(A)</th>
                                <th scope="row" class="table-danger">BP(A)</th>
                                <th scope="row" class="table-dark">CLEAR TYPE(L)</th>
                                <th scope="row" class="table-dark">DJ LEVEL(L)</th>
                                <th scope="row" class="table-dark">SCORE(L)</th>
                                <th scope="row" class="table-dark">PGREAT(L)</th>
                                <th scope="row" class="table-dark">GREAT(L)</th>
                                <th scope="row" class="table-dark">BP(L)</th>
                                <th scope="row" class="table-secondary">LASTPLAY</th>
                                <th scope="row" class="table-secondary">CREATED_AT</th>
                                <th scope="row" class="table-secondary">UPDATED_AT</th>
                            </tr>

                            {{-- DBから取得したデータを一覧表示する --}}
                            @foreach ($data as $val)
                                <tr>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $val->genre }}</td>
                                    <td>{{ $val->artist }}</td>
                                    <td>{{ $val->playcount }}</td>
                                    <td>{{ $val->sp_b_cleartype }}</td>
                                    <td>{{ $val->sp_b_djlevel }}</td>
                                    <td>{{ $val->sp_b_score }}</td>
                                    <td>{{ $val->sp_b_pgreat }}</td>
                                    <td>{{ $val->sp_b_great }}</td>
                                    <td>{{ $val->sp_b_misscount }}</td>
                                    <td>{{ $val->sp_n_cleartype }}</td>
                                    <td>{{ $val->sp_n_djlevel }}</td>
                                    <td>{{ $val->sp_n_score }}</td>
                                    <td>{{ $val->sp_n_pgreat }}</td>
                                    <td>{{ $val->sp_n_great }}</td>
                                    <td>{{ $val->sp_n_misscount }}</td>
                                    <td>{{ $val->sp_h_cleartype }}</td>
                                    <td>{{ $val->sp_h_djlevel }}</td>
                                    <td>{{ $val->sp_h_score }}</td>
                                    <td>{{ $val->sp_h_pgreat }}</td>
                                    <td>{{ $val->sp_h_great }}</td>
                                    <td>{{ $val->sp_h_misscount }}</td>
                                    <td>{{ $val->sp_a_cleartype }}</td>
                                    <td>{{ $val->sp_a_djlevel }}</td>
                                    <td>{{ $val->sp_a_score }}</td>
                                    <td>{{ $val->sp_a_pgreat }}</td>
                                    <td>{{ $val->sp_a_great }}</td>
                                    <td>{{ $val->sp_a_misscount }}</td>
                                    <td>{{ $val->sp_l_cleartype }}</td>
                                    <td>{{ $val->sp_l_djlevel }}</td>
                                    <td>{{ $val->sp_l_score }}</td>
                                    <td>{{ $val->sp_l_pgreat }}</td>
                                    <td>{{ $val->sp_l_great }}</td>
                                    <td>{{ $val->sp_l_misscount }}</td>
                                    <td>{{ $val->lastplay_at }}</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>{{ $val->updated_at }}</td>
                                </tr>
                            @endforeach
                        </thead>
                    </table>
                </div>
            @endif
        @endif
    @endguest
@endsection
