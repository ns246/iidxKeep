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
            if (count($djdata) === 0) {
                $djname = '';
                $iidxid1 = '';
                $iidxid2 = '';
                $area = '---';
                $playcount = '';
                $class_id_sp = '---';
                $class_id_dp = '---';
                $djp_sp = '';
                $djp_dp = '';
                $arena_class_sp = '---';
                $arena_class_dp = '---';
                $updated_at = '---';
            } else {
                $djname = $djdata[0]->{'dj_name'};
                $iidxid = $djdata[0]->{'iidx_id'};
                $iidxid_tmp = explode('-', $iidxid);
                $iidxid1 = $iidxid_tmp[0];
                $iidxid2 = $iidxid_tmp[1];
                $area = $djdata[0]->{'area_id'};
                $playcount = $djdata[0]->{'playcount'};
                $class_id_sp = $djdata[0]->{'class_id_sp'};
                $class_id_dp = $djdata[0]->{'class_id_dp'};
                $djp_sp = $djdata[0]->{'djp_sp'};
                $djp_dp = $djdata[0]->{'djp_dp'};
                $arena_class_sp = $djdata[0]->{'arena_class_sp'};
                $arena_class_dp = $djdata[0]->{'arena_class_dp'};
                $updated_at = $djdata[0]->{'updated_at'};
            }
            ?>
            <form class="g-3 align-items-center" action="{{ route('profile.update') }}" method="post" name="form">
                @csrf
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">DJ DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">DJ NAME</th>
                            <td>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">DJ</span>
                                    <input type="text" name="dj_name" class="form-control" aria-describedby="basic-addon1"
                                        style="max-width: 100px;" placeholder="{{ $djname }}" value="{{ $djname }}" pattern="^[a-zA-Z0-9]+$" maxlength="6" required>
                                </div>
                                @if ($errors->has('dj_name'))
                                    {{ $errors->first('dj_name') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">所属エリア</th>
                            <td>
                                <select id="inputState" name="area" class="form-select" style="max-width: 190px;">
                                    <?php
                                    for ($i = 0; count($areas) > $i; $i++) {
                                        if (count($djdata) === 0) {
                                            #
                                        } elseif ($areas[$i]->{'area'} == $area) {
                                            echo '<option  selected>' . $areas[$i]->{'area'} . '</option>';
                                            $i++;
                                        }
                                        echo '<option>' . $areas[$i]->{'area'} . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">IIDX ID</th>
                            <td>
                                <div class="input-group">
                                    <input name="iidx_id_1" type="text" pattern="^[0-9]+$" class="form-control text-center" maxlength="4"
                                        style="max-width:80px;" placeholder="{{ $iidxid1 }}" value="{{ $iidxid1 }}" required>
                                    <span class="input-group-text">-</span>
                                    <input name="iidx_id_2" type="text" pattern="^[0-9]+$" class="form-control text-center" maxlength="4"
                                        style="max-width:80px;" placeholder="{{ $iidxid2 }}" value="{{ $iidxid2 }}" required>
                                </div>
                                @if ($errors->has('iidx_id_1'))
                                    {{ $errors->first('iidx_id_1') }}
                                @endif
                                @if ($errors->has('iidx_id_2'))
                                    {{ $errors->first('iidx_id_2') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">プレイカウント</th>
                            <td>
                                <input type="number" name="pcount" class="form-control" placeholder="{{ $playcount }}" 
                                    value="{{ $playcount }}" style="max-width: 90px;">
                                @if ($errors->has('pcount'))
                                    {{ $errors->first('pcount') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">段位(SP)</th>
                            <td>
                                <select id="inputState" name="cls_sp" class="form-select" style="max-width: 190px;">
                                    <option>---</option>
                                    <?php
                                    for ($i = 0; count($class) > $i; $i++) {
                                        if (count($djdata) === 0) {
                                            #
                                        } elseif ($class[$i]->{'class'} == $class_id_sp) {
                                            echo '<option  selected>' . $class[$i]->{'class'} . '</option>';
                                            $i++;
                                        }
                                        echo '<option>' . $class[$i]->{'class'} . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">段位(DP)</th>
                            <td>
                                <select id="inputState" name="cls_dp" class="form-select" style="max-width: 190px;">
                                    <option>---</option>
                                    <?php
                                    for ($i = 0; count($class) > $i; $i++) {
                                        if (count($djdata) === 0) {
                                            #
                                        } elseif ($class[$i]->{'class'} == $class_id_dp) {
                                            echo '<option  selected>' . $class[$i]->{'class'} . '</option>';
                                            $i++;
                                        }
                                        echo '<option>' . $class[$i]->{'class'} . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">DJ POINT(SP)</th>
                            <td>
                                <input type="number" name="djp_sp" class="form-control" placeholder="{{ $djp_sp }}"
                                    value="{{ $djp_sp }}" style="max-width: 90px;">
                                @if ($errors->has('djp_sp'))
                                    {{ $errors->first('djp_sp') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">DJ POINT(DP)</th>
                            <td>
                                <input type="number" name="djp_dp" class="form-control" placeholder="{{ $djp_dp }}"
                                    value="{{ $djp_dp }}" style="max-width: 90px;">
                                @if ($errors->has('djp_dp'))
                                    {{ $errors->first('djp_dp') }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">アリーナクラス(SP)</th>
                            <td>
                                <select id="inputState" name="acls_sp" class="form-select" style="max-width: 190px;">
                                    <option>---</option>
                                    <?php
                                    for ($i = 0; count($arena_class) > $i; $i++) {
                                        if (count($djdata) === 0) {
                                            #
                                        } elseif ($arena_class[$i]->{'class'} == $arena_class_sp) {
                                            echo '<option  selected>' . $arena_class[$i]->{'class'} . '</option>';
                                            $i++;
                                        }
                                        echo '<option>' . $arena_class[$i]->{'class'} . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">アリーナクラス(DP)</th>
                            <td>
                                <select id="inputState" name="acls_dp" class="form-select" style="max-width: 190px;">
                                    <option>---</option>
                                    <?php
                                    for ($i = 0; count($arena_class) > $i; $i++) {
                                        if (count($djdata) === 0) {
                                            #
                                        } elseif ($arena_class[$i]->{'class'} == $arena_class_dp) {
                                            echo '<option  selected>' . $arena_class[$i]->{'class'} . '</option>';
                                            $i++;
                                        }
                                        echo '<option>' . $arena_class[$i]->{'class'} . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary float-end">登録</button>
            </form>
        @endif
    @endguest
@endsection
