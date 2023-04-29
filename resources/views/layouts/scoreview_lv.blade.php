<div class="mt-1 mb-1 row jstify-content-center">
    {{ $musiclistUnion->links('pagination::bootstrap-5') }}
</div>
<div class="mb-5">
    <table class="table caption-top">
        <tr>
            <th scope="row" style="min-width:250px; max-width: 500px;">TITLE</th>
            <th scope="row" style="width: 10px;"></th>
            <th scope="row" style="width: 48px;">LV</th>
            <th scope="row" class="resp ctype_hide">CLEAR</th>
            <th scope="row">SCORE</th>
            <th scope="row"></th>
            <th scope="row" style="width: 150px;">RATE</th>
            <th scope="row">MISS</th>
            @foreach ($musiclistUnion as $music_data)
                @php include $param; @endphp
        </tr>
        @if ($music_data->sp_b_lv == $level)
            <tr>
                <td rowspan="1" class="mt-1 mb-1">
					<span class="mtitle r overflow" style="width:100%;display:block;">{{ $music_data->title }}</span>
                </td>
                {{-- クリアランプ BIGGINER --}}
                <td class="lamp">
                    @if (is_null($score_data?->sp_b_cleartype))
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($score_data?->sp_b_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル BIGGINER --}}
                <td class="text-center" style="background-color: rgba(121,209,0,.3);">
                    @if ($music_data?->{'sp_b_lv'} == '')
                        --
                    @else
                        <span class="level b">{{ $music_data->{'sp_b_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ BIGGINER --}}
                <td class="ctype_hide">
                    @if (is_null($score_data?->sp_b_cleartype))
                        <span class="clear text-nowrap noplay">NO PLAY</span>
                    @elseif ($score_data?->sp_b_cleartype == 'NO PLAY')
                        <span class="clear text-nowrap noplay">{{ $score_data?->sp_b_cleartype }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'FAILED')
                        <span class="clear text-nowrap failed">{{ $score_data?->sp_b_cleartype }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'EASY CLEAR')
                        <span
                            class="clear text-nowrap eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $score_data?->sp_b_cleartype) }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear text-nowrap aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $score_data?->sp_b_cleartype) }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'CLEAR')
                        <span class="clear text-nowrap nclear">{{ $score_data?->sp_b_cleartype }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'HARD CLEAR')
                        <span
                            class="clear text-nowrap hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $score_data?->sp_b_cleartype) }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear text-nowrap exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $score_data?->sp_b_cleartype) }}</span>
                    @elseif ($score_data?->sp_b_cleartype == 'FULLCOMBO CLEAR')
                        <span
                            class="clear text-nowrap fcombo">{{ str_replace(' CLEAR', '', $score_data?->sp_b_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア BIGGINER --}}
                <td style="text-align: center;line-height: 0.9;">
                    @if (is_null($score_data?->sp_b_score))
                        0
                    @else
                        {{ $score_data?->sp_b_score }}
                    @endif
                    <br><span style="font-size: 10px;">
                        @if ($music_data?->{'sp_b_notes'} == '')
                            ---
                        @elseif ($score_data?->sp_b_djlevel == 'A')
                            AA -{{ ceil($music_data?->{'sp_b_notes'} * 2 * 0.834) - $score_data?->sp_b_score }}
                        @elseif ($score_data?->sp_b_djlevel == 'AA' && $score_data?->sp_b_score < $music_data?->{'sp_b_notes'} * 2 * 0.889)
                            AA +{{ ceil($score_data?->sp_b_score - $music_data?->{'sp_b_notes'} * 2 * 0.834) }}
                        @elseif ($score_data?->sp_b_djlevel == 'AA')
                            AAA {{ ceil($music_data?->{'sp_b_notes'} * 2 * 0.889) - $score_data?->sp_b_score }}
                        @elseif ($score_data?->sp_b_djlevel == 'AAA' && $score_data?->sp_b_score < $music_data?->{'sp_b_notes'} * 2 * 0.944)
                            AAA +{{ ceil($score_data?->sp_b_score - $music_data?->{'sp_b_notes'} * 2 * 0.889) }}
                        @elseif ($score_data?->sp_b_djlevel == 'AAA' && $score_data?->sp_b_score > $music_data?->{'sp_b_notes'} * 2 * 0.944)
                            MAX {{ ceil($music_data?->{'sp_b_notes'} * 2) - $score_data?->sp_b_score }}
                        @else
                            ---
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL BIGGINER --}}
                <td>
                    @if ($score_data?->sp_b_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($score_data?->sp_b_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($score_data?->sp_b_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($score_data?->sp_b_djlevel == '')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $score_data?->sp_b_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ BIGGINER --}}
                <td style="width:100px;padding:0 0 0 0;">
                    <div class="div_td rate">
                        <div class="rate_wrapper">
                            <div class="rate_graph">
                                <div class="bar_area border">
                                    <div class="bar border" style="flex-basis: 0;">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(600% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border" style="flex-basis: calc(100% / 9);">
                                    </div>
                                </div>
                            </div>
                            <div class="rate_graph">
                                <div class="bar_area">
                                    <div class="bar my"
                                        style="flex-basis:
										@if ($score_data?->sp_b_score == 0 || $music_data?->{'sp_b_notes'} == 0) 0%
										@else
											{{ round(($score_data?->sp_b_score / ($music_data?->{'sp_b_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($score_data?->sp_b_score == 0 || $music_data?->{'sp_b_notes'} == 0)
                                    0 %
                                    @else{{ round(($score_data?->sp_b_score / ($music_data?->{'sp_b_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if (is_null($score_data?->sp_b_misscount))
                        ---
                    @else
                        {{ $score_data?->sp_b_misscount }}
                    @endif
                </td>
            </tr>
        @else
        @endif

        {{-- NORMAL --}}
        @if ($music_data->sp_n_lv == $level)
            <tr>
                <td rowspan="1" class="mt-1 mb-1"><span class="mtitle"
                        style="font-size:0.9rem!important; font-weight:100;"><b>{{ $music_data->title }}</b></span>
                </td>
                {{-- クリアランプ NORMAL --}}
                <td class="lamp">
                    @if (is_null($score_data?->sp_n_cleartype))
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($score_data?->sp_n_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル NORMAL --}}
                <td class="text-center" style="background-color: rgba(32,168,255,.3);">
                    @if ($music_data?->{'sp_n_lv'} == '')
                        --
                    @else
                        <span class="level n">{{ $music_data->{'sp_n_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ NORMAL --}}
                <td class="ctype_hide">
                    @if (is_null($score_data?->sp_n_cleartype))
                        <span class="clear text-nowrap noplay">NO PLAY</span>
                    @elseif ($score_data?->sp_n_cleartype == 'NO PLAY')
                        <span class="clear text-nowrap noplay">{{ $score_data?->sp_n_cleartype }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'FAILED')
                        <span class="clear text-nowrap failed">{{ $score_data?->sp_n_cleartype }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'EASY CLEAR')
                        <span
                            class="clear text-nowrap eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $score_data?->sp_n_cleartype) }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear text-nowrap aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $score_data?->sp_n_cleartype) }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'CLEAR')
                        <span class="clear text-nowrap nclear">{{ $score_data?->sp_n_cleartype }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'HARD CLEAR')
                        <span
                            class="clear text-nowrap hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $score_data?->sp_n_cleartype) }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear text-nowrap exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $score_data?->sp_n_cleartype) }}</span>
                    @elseif ($score_data?->sp_n_cleartype == 'FULLCOMBO CLEAR')
                        <span
                            class="clear text-nowrap fcombo">{{ str_replace(' CLEAR', '', $score_data?->sp_n_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア NORMAL --}}
                <td style="text-align: center; line-height: 0.9;">
                    @if (is_null($score_data?->sp_n_score))
                        0
                    @else
                        {{ $score_data?->sp_n_score }}
                    @endif
                    <br><span style="font-size: 10px;">
                        @if ($music_data?->{'sp_n_notes'} == '')
                        @elseif ($score_data?->sp_n_djlevel == 'A')
                            AA -{{ ceil($music_data?->{'sp_n_notes'} * 2 * 0.834) - $score_data?->sp_n_score }}
                        @elseif ($score_data?->sp_n_djlevel == 'AA' && $score_data?->sp_n_score < $music_data?->{'sp_n_notes'} * 2 * 0.889)
                            AA +{{ ceil($score_data?->sp_n_score - $music_data?->{'sp_n_notes'} * 2 * 0.834) }}
                        @elseif ($score_data?->sp_n_djlevel == 'AA')
                            AAA {{ ceil($music_data?->{'sp_n_notes'} * 2 * 0.889) - $score_data?->sp_n_score }}
                        @elseif ($score_data?->sp_n_djlevel == 'AAA' && $score_data?->sp_n_score < $music_data?->{'sp_n_notes'} * 2 * 0.944)
                            AAA +{{ ceil($score_data?->sp_n_score - $music_data?->{'sp_n_notes'} * 2 * 0.889) }}
                        @elseif ($score_data?->sp_n_djlevel == 'AAA' && $score_data?->sp_n_score > $music_data?->{'sp_n_notes'} * 2 * 0.944)
                            MAX {{ ceil($music_data?->{'sp_n_notes'} * 2) - $score_data?->sp_n_score }}
                        @else
                            --
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL NORMAL --}}
                <td>
                    @if (is_null($score_data?->sp_n_djlevel))
                        <span class="rank">---</span>
                    @elseif ($score_data?->sp_n_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($score_data?->sp_n_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($score_data?->sp_n_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($score_data?->sp_n_djlevel == '')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $score_data?->sp_n_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ NORMAL --}}
                <td style="width:100px;padding:0 0 0 0;">
                    <div class="div_td rate">
                        <div class="rate_wrapper">
                            <div class="rate_graph">
                                <div class="bar_area border">
                                    <div class="bar border" style="flex-basis: 0;">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(600% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border" style="flex-basis: calc(100% / 9);">
                                    </div>
                                </div>
                            </div>
                            <div class="rate_graph">
                                <div class="bar_area">
                                    <div class="bar my"
                                        style="flex-basis:
										@if ($score_data?->sp_n_score == 0 || $music_data?->{'sp_n_notes'} == 0) 0%
										@else
											{{ round(($score_data?->sp_n_score / ($music_data?->{'sp_n_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($score_data?->sp_n_score == 0 || $music_data?->{'sp_n_notes'} == 0)
                                    0 %
                                    @else{{ round(($score_data?->sp_n_score / ($music_data?->{'sp_n_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if (is_null($score_data?->sp_n_misscount))
                        ---
                    @else
                        {{ $score_data?->sp_n_misscount }}
                    @endif
                </td>
            @else
        @endif
        </tr>

        {{-- HYPER --}}
        @if ($music_data->sp_h_lv == $level)
            <tr>
                <td rowspan="1" class="mt-1 mb-1"><span class="mtitle"
                        style="font-size:0.9rem!important; font-weight:100;"><b>{{ $music_data->title }}</b></span>
                </td>
                {{-- クリアランプ HYPER --}}
                <td class="lamp">
                    @if (is_null($score_data?->sp_h_cleartype))
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($score_data?->sp_h_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル HYPER --}}
                <td class="text-center" style="background-color: rgba(255,174,0,.3);">
                    @if ($music_data?->{'sp_h_lv'} == '')
                        --
                    @else
                        <span class="level h">{{ $music_data->{'sp_h_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ HYPER --}}
                <td class="ctype_hide">
                    @if (is_null($score_data?->sp_h_cleartype))
                        <span class="clear text-nowrap noplay">NO PLAY</span>
                    @elseif ($score_data?->sp_h_cleartype == 'NO PLAY')
                        <span class="clear text-nowrap noplay">{{ $score_data?->sp_h_cleartype }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'FAILED')
                        <span class="clear text-nowrap failed">{{ $score_data?->sp_h_cleartype }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'EASY CLEAR')
                        <span
                            class="clear text-nowrap eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $score_data?->sp_h_cleartype) }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear text-nowrap aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $score_data?->sp_h_cleartype) }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'CLEAR')
                        <span class="clear text-nowrap nclear">{{ $score_data?->sp_h_cleartype }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'HARD CLEAR')
                        <span
                            class="clear text-nowrap hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $score_data?->sp_h_cleartype) }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear text-nowrap exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $score_data?->sp_h_cleartype) }}</span>
                    @elseif ($score_data?->sp_h_cleartype == 'FULLCOMBO CLEAR')
                        <span
                            class="clear text-nowrap fcombo">{{ str_replace(' CLEAR', '', $score_data?->sp_h_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア HYPER --}}
                <td style="text-align: center; line-height: 0.9;">
                    @if (is_null($score_data?->sp_h_score))
                        0
                    @else
                        {{ $score_data?->sp_h_score }}
                    @endif
                    <br>
                    <span style="font-size: 10px;">
                        @if ($music_data?->{'sp_h_notes'} == '')
                            --
                        @elseif ($score_data?->sp_h_djlevel == 'A')
                            AA -{{ ceil($music_data?->{'sp_h_notes'} * 2 * 0.834) - $score_data?->sp_h_score }}
                        @elseif ($score_data?->sp_h_djlevel == 'AA' && $score_data?->sp_h_score < $music_data?->{'sp_h_notes'} * 2 * 0.889)
                            AA +{{ ceil($score_data?->sp_h_score - $music_data?->{'sp_h_notes'} * 2 * 0.834) }}
                        @elseif ($score_data?->sp_h_djlevel == 'AA')
                            AAA {{ ceil($music_data?->{'sp_h_notes'} * 2 * 0.889) - $score_data?->sp_h_score }}
                        @elseif ($score_data?->sp_h_djlevel == 'AAA' && $score_data?->sp_h_score < $music_data?->{'sp_h_notes'} * 2 * 0.944)
                            AAA +{{ ceil($score_data?->sp_h_score - $music_data?->{'sp_h_notes'} * 2 * 0.889) }}
                        @elseif ($score_data?->sp_h_djlevel == 'AAA' && $score_data?->sp_h_score > $music_data?->{'sp_h_notes'} * 2 * 0.944)
                            MAX {{ ceil($music_data?->{'sp_h_notes'} * 2) - $score_data?->sp_h_score }}
                        @else
                            ---
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL HYPER --}}
                <td>
                    @if ($score_data?->sp_h_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($score_data?->sp_h_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($score_data?->sp_h_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($score_data?->sp_h_djlevel == '')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $score_data?->sp_h_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ HYPER --}}
                <td style="width:100px;padding:0 0 0 0;">
                    <div class="div_td rate">
                        <div class="rate_wrapper">
                            <div class="rate_graph">
                                <div class="bar_area border">
                                    <div class="bar border" style="flex-basis: 0;">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(600% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border" style="flex-basis: calc(100% / 9);">
                                    </div>
                                </div>
                            </div>
                            <div class="rate_graph">
                                <div class="bar_area">
                                    <div class="bar my"
                                        style="flex-basis:
										@if ($score_data?->sp_h_score == 0 || $music_data?->{'sp_h_notes'} == 0) 0%
										@else
											{{ round(($score_data?->sp_h_score / ($music_data?->{'sp_h_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($score_data?->sp_h_score == 0 || $music_data?->{'sp_h_notes'} == 0)
                                    0 %
                                    @else{{ round(($score_data?->sp_h_score / ($music_data?->{'sp_h_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if (is_null($score_data?->sp_h_misscount))
                        ---
                    @else
                        {{ $score_data?->sp_h_misscount }}
                    @endif
                </td>
            </tr>
        @else
        @endisset

        {{-- ANOTHER --}}
        @if ($music_data->sp_a_lv == $level)
            <tr>
                <td rowspan="1" class="mt-1 mb-1"><span class="mtitle"
                        style="font-size:0.9rem!important; font-weight:100;"><b>{{ $music_data?->title }}</b></span>
                </td>
                {{-- クリアランプ ANOTHER --}}
                <td class="lamp">
                    @if (is_null($score_data?->sp_a_cleartype))
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($score_data?->sp_a_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル ANOTHER --}}
                <td class="text-center" style="background-color: rgba(255,0,0,.3);">
                    @if ($music_data?->{'sp_a_lv'} == '')
                        --
                    @else
                        <span class="level a">{{ $music_data->{'sp_a_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ ANOTHER --}}
                <td class="ctype_hide">
                    @if (is_null($score_data?->sp_a_cleartype))
                        <span class="clear text-nowrap noplay">NO PLAY</span>
                    @elseif ($score_data?->sp_a_cleartype == 'NO PLAY')
                        <span class="clear text-nowrap noplay">{{ $score_data?->sp_a_cleartype }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'FAILED')
                        <span class="clear text-nowrap failed">{{ $score_data?->sp_a_cleartype }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'EASY CLEAR')
                        <span
                            class="clear text-nowrap eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $score_data?->sp_a_cleartype) }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear text-nowrap aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $score_data?->sp_a_cleartype) }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'CLEAR')
                        <span class="clear text-nowrap nclear">{{ $score_data?->sp_a_cleartype }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'HARD CLEAR')
                        <span
                            class="clear text-nowrap hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $score_data?->sp_a_cleartype) }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear text-nowrap exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $score_data?->sp_a_cleartype) }}</span>
                    @elseif ($score_data?->sp_a_cleartype == 'FULLCOMBO CLEAR')
                        <span
                            class="clear text-nowrap fcombo">{{ str_replace(' CLEAR', '', $score_data?->sp_a_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア ANOTHER --}}
                <td style="text-align: center; line-height: 0.9;">
                    @if (is_null($score_data?->sp_a_score))
                        0
                    @else
                        {{ $score_data?->sp_a_score }}
                    @endif
                    <br>
                    <span style="font-size: 10px;">
                        @if ($music_data?->{'sp_a_notes'} == '')
                            ---
                        @elseif ($score_data?->sp_a_djlevel == 'A')
                            AA -{{ ceil($music_data?->{'sp_a_notes'} * 2 * 0.834) - $score_data?->sp_a_score }}
                        @elseif ($score_data?->sp_a_djlevel == 'AA' && $score_data?->sp_a_score < $music_data?->{'sp_a_notes'} * 2 * 0.889)
                            AA +{{ ceil($score_data?->sp_a_score - $music_data?->{'sp_a_notes'} * 2 * 0.834) }}
                        @elseif ($score_data?->sp_a_djlevel == 'AA')
                            AAA {{ ceil($music_data?->{'sp_a_notes'} * 2 * 0.889) - $score_data?->sp_a_score }}
                        @elseif ($score_data?->sp_a_djlevel == 'AAA' && $score_data?->sp_a_score < $music_data?->{'sp_a_notes'} * 2 * 0.944)
                            AAA +{{ ceil($score_data?->sp_a_score - $music_data?->{'sp_a_notes'} * 2 * 0.889) }}
                        @elseif ($score_data?->sp_a_djlevel == 'AAA' && $score_data?->sp_a_score > $music_data?->{'sp_a_notes'} * 2 * 0.944)
                            MAX {{ ceil($music_data?->{'sp_a_notes'} * 2) - $score_data?->sp_a_score }}
                        @else
                            ---
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL ANOTHER --}}
                <td>
                    @if ($score_data?->sp_a_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($score_data?->sp_a_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($score_data?->sp_a_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($score_data?->sp_a_djlevel == '')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $score_data?->sp_a_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ ANOTHER --}}
                <td style="width:100px;padding:0 0 0 0;">
                    <div class="div_td rate">
                        <div class="rate_wrapper">
                            <div class="rate_graph">
                                <div class="bar_area border">
                                    <div class="bar border" style="flex-basis: 0;">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(600% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border" style="flex-basis: calc(100% / 9);">
                                    </div>
                                </div>
                            </div>
                            <div class="rate_graph">
                                <div class="bar_area">
                                    <div class="bar my"
                                        style="flex-basis:
												@if ($score_data?->sp_a_score == 0 || $music_data?->{'sp_a_notes'} == 0) 0%
												@else
													{{ round(($score_data?->sp_a_score / ($music_data?->{'sp_a_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($score_data?->sp_a_score == 0 || $music_data?->{'sp_a_notes'} == 0)
                                    0 %
                                    @else{{ round(($score_data?->sp_a_score / ($music_data?->{'sp_a_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if (is_null($score_data?->sp_a_misscount))
                        ---
                    @else
                        {{ $score_data?->sp_a_misscount }}
                    @endif
                </td>
            </tr>
        @else
        @endisset

        {{-- LEGGENDARIA --}}
        @if ($music_data->sp_l_lv == $level)
            <tr>
                <td rowspan="1" class="mt-1 mb-1"><span class="mtitle"
                        style="font-size:0.9rem!important; font-weight:100;"><b>{{ $music_data?->title }}</b></span>
                </td>
                {{-- クリアランプ LEGGENDARIA --}}
                <td class="lamp">
                    @if (is_null($score_data?->sp_l_cleartype))
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($score_data?->sp_l_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル LEGGENDARIA --}}
                <td class="text-center" style="background-color: rgba(206,0,214,.3);">
                    @if ($music_data?->{'sp_l_lv'} == '')
                        --
                    @else
                        <span class="level l">{{ $music_data->{'sp_l_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ LEGGENDARIA --}}
                <td class="ctype_hide">
                    @if (is_null($score_data?->sp_l_cleartype))
                        <span class="clear text-nowrap noplay">NO PLAY</span>
                    @elseif ($score_data?->sp_l_cleartype == 'NO PLAY')
                        <span class="clear text-nowrap noplay">{{ $score_data?->sp_l_cleartype }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'FAILED')
                        <span class="clear text-nowrap failed">{{ $score_data?->sp_l_cleartype }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'EASY CLEAR')
                        <span
                            class="clear text-nowrap eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $score_data?->sp_l_cleartype) }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear text-nowrap aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $score_data?->sp_l_cleartype) }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'CLEAR')
                        <span class="clear text-nowrap nclear">{{ $score_data?->sp_l_cleartype }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'HARD CLEAR')
                        <span
                            class="clear text-nowrap hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $score_data?->sp_l_cleartype) }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear text-nowrap exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $score_data?->sp_l_cleartype) }}</span>
                    @elseif ($score_data?->sp_l_cleartype == 'FULLCOMBO CLEAR')
                        <span
                            class="clear text-nowrap fcombo">{{ str_replace(' CLEAR', '', $score_data?->sp_l_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア LEGGENDARIA --}}
                <td style="text-align: center; line-height: 0.9;">
                    @if (is_null($score_data?->sp_l_score))
                        0
                    @else
                        {{ $score_data?->sp_l_score }}
                    @endif


                    <br><span style="font-size: 10px;">
                        @if ($music_data?->{'sp_l_notes'} == '')
                            ---
                        @elseif ($score_data?->sp_l_djlevel == 'A')
                            AA -{{ ceil($music_data?->{'sp_l_notes'} * 2 * 0.834) - $score_data?->sp_l_score }}
                        @elseif ($score_data?->sp_l_djlevel == 'AA' && $score_data?->sp_l_score < $music_data?->{'sp_l_notes'} * 2 * 0.889)
                            AA +{{ ceil($score_data?->sp_l_score - $music_data?->{'sp_l_notes'} * 2 * 0.834) }}
                        @elseif ($score_data?->sp_l_djlevel == 'AA')
                            AAA {{ ceil($music_data?->{'sp_l_notes'} * 2 * 0.889) - $score_data?->sp_l_score }}
                        @elseif ($score_data?->sp_l_djlevel == 'AAA' && $score_data?->sp_l_score < $music_data?->{'sp_l_notes'} * 2 * 0.944)
                            AAA
                            +{{ ceil($score_data?->sp_l_score - $music_data?->{'sp_l_notes'} * 2 * 0.889) }}
                        @elseif ($score_data?->sp_l_djlevel == 'AAA' && $score_data?->sp_l_score > $music_data?->{'sp_l_notes'} * 2 * 0.944)
                            MAX {{ ceil($music_data?->{'sp_l_notes'} * 2) - $score_data?->sp_l_score }}
                        @else
                            ---
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL LEGGENDARIA --}}
                <td>
                    @if ($score_data?->sp_l_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($score_data?->sp_l_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($score_data?->sp_l_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($score_data?->sp_l_djlevel == '')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $score_data?->sp_l_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ LEGGENDARIA --}}
                <td style="width:100px;padding:0 0 0 0;">
                    <div class="div_td rate">
                        <div class="rate_wrapper">
                            <div class="rate_graph">
                                <div class="bar_area border">
                                    <div class="bar border" style="flex-basis: 0;">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(600% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border over" style="flex-basis: calc(100% / 9);">
                                    </div>
                                    <div class="bar border" style="flex-basis: calc(100% / 9);">
                                    </div>
                                </div>
                            </div>
                            <div class="rate_graph">
                                <div class="bar_area">
                                    <div class="bar my"
                                        style="flex-basis:
												@if ($score_data?->sp_l_score == 0 || $music_data?->{'sp_l_notes'} == 0) 0%
												@else
													{{ round(($score_data?->sp_l_score / ($music_data?->{'sp_l_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($score_data?->sp_l_score == 0 || $music_data?->{'sp_l_notes'} == 0)
                                    0 %
                                    @else{{ round(($score_data?->sp_l_score / ($music_data?->{'sp_l_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if (is_null($score_data?->sp_l_misscount))
                        ---
                    @else
                        {{ $score_data?->sp_l_misscount }}
                    @endif
                </td>
            </tr>
        @else
        @endisset
    @endforeach



</table>
<div class="mt-1 mb-1 row jstify-content-center">
{{ $musiclistUnion->links('pagination::bootstrap-4') }}
</div>
</div>
