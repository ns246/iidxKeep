<div class="mt-1 mb-1 row jstify-content-center">
    {{ $scoresUnion->links('pagination::bootstrap-5') }}
</div>
<div class="mb-5">
    <table class="table caption-top">
        <tr>
            <th scope="row" style="min-width:250px; max-width: 500px;">TITLE</th>
            <th scope="row" style="width: 10px;"></th>
            <th scope="row" style="width: 48px;">LV</th>
            <th scope="row" class="resp">CLEAR</th>
            <th scope="row">SCORE</th>
            <th scope="row"></th>
            <th scope="row" style="width: 150px;">RATE</th>
            <th scope="row">MISS</th>
            @foreach ($scoresUnion as $music_data)
                @php
                    include $param;
                @endphp
        </tr>

        <tr>
            <td rowspan="5" class="mt-1 mb-1"><span class="mtitle lead"><b>{{ $music_data->title }}</b></span><br>
            </td>
                {{-- クリアランプ BIGGINER --}}
                <td class="lamp" @if ($music_data?->sp_b_cleartype !== $type) style='display:none;' @endif>
                    @if ($music_data->sp_b_cleartype == 'NO PLAY')
                        <span class="lamp noplay"></span>
                    @elseif ($music_data->sp_b_cleartype == 'FAILED')
                        <span class="lamp failed"></span>
                    @elseif ($music_data->sp_b_cleartype == 'EASY CLEAR')
                        <span class="lamp eclear"></span>
                    @elseif ($music_data->sp_b_cleartype == 'ASSIST CLEAR')
                        <span class="lamp aclear"></span>
                    @elseif ($music_data->sp_b_cleartype == 'CLEAR')
                        <span class="lamp nclear"></span>
                    @elseif ($music_data->sp_b_cleartype == 'HARD CLEAR')
                        <span class="lamp hard"></span>
                    @elseif ($music_data->sp_b_cleartype == 'EX HARD CLEAR')
                        <span class="lamp exhard"></span>
                    @elseif ($music_data->sp_b_cleartype == 'FULLCOMBO CLEAR')
                        <span class="lamp fcombo"></span>
                    @endif
                </td>
                {{-- レベル BIGGINER --}}
                <td class="text-center"
                    style="background-color: rgba(121,209,0,.3);@if ($music_data?->sp_b_cleartype !== $type) display:none; @endif">
                    @if ($score_data?->{'sp_b_lv'} == '')
                        --
                    @else
                        <span class="level b">{{ $score_data->{'sp_b_lv'} }}</span>
                    @endif
                </td>
                {{-- クリアタイプ BIGGINER --}}
                <td @if ($music_data?->sp_b_cleartype !== $type) style='display:none;' @endif>
                    @if ($music_data->sp_b_cleartype == 'NO PLAY')
                        <span class="clear noplay">{{ $music_data->sp_b_cleartype }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'FAILED')
                        <span class="clear failed">{{ $music_data->sp_b_cleartype }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'EASY CLEAR')
                        <span
                            class="clear eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $music_data->sp_b_cleartype) }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'ASSIST CLEAR')
                        <span
                            class="clear aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $music_data->sp_b_cleartype) }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'CLEAR')
                        <span class="clear nclear">{{ $music_data->sp_b_cleartype }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'HARD CLEAR')
                        <span
                            class="clear hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $music_data->sp_b_cleartype) }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'EX HARD CLEAR')
                        <span
                            class="clear exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $music_data->sp_b_cleartype) }}</span>
                    @elseif ($music_data->sp_b_cleartype == 'FULLCOMBO CLEAR')
                        <span class="clear fcombo">{{ str_replace(' CLEAR', '', $music_data->sp_b_cleartype) }}</span>
                    @endif
                </td>
                {{-- スコア BIGGINER --}}
                <td style="text-align: center;line-height: 0.9;@if ($music_data?->sp_b_cleartype !== $type) display:none; @endif">
                    {{ $music_data->sp_b_score }}<br>
                    <span style="font-size: 10px;">

                        @if ($score_data?->{'sp_b_notes'} == '')
                        @elseif ($music_data->sp_b_djlevel == 'A')
                            AA -{{ ceil($score_data?->{'sp_b_notes'} * 2 * 0.834) - $music_data->sp_b_score }}
                        @elseif ($music_data->sp_b_djlevel == 'AA' && $music_data->sp_b_score < $score_data?->{'sp_b_notes'} * 2 * 0.889)
                            AA +{{ ceil($music_data->sp_b_score - $score_data?->{'sp_b_notes'} * 2 * 0.834) }}
                        @elseif ($music_data->sp_b_djlevel == 'AA')
                            AAA {{ ceil($score_data?->{'sp_b_notes'} * 2 * 0.889) - $music_data->sp_b_score }}
                        @elseif ($music_data->sp_b_djlevel == 'AAA' && $music_data->sp_b_score < $score_data?->{'sp_b_notes'} * 2 * 0.944)
                            AAA +{{ ceil($music_data->sp_b_score - $score_data?->{'sp_b_notes'} * 2 * 0.889) }}
                        @elseif ($music_data->sp_b_djlevel == 'AAA' && $music_data->sp_b_score > $score_data?->{'sp_b_notes'} * 2 * 0.944)
                            MAX {{ ceil($score_data?->{'sp_b_notes'} * 2) - $music_data->sp_b_score }}
                        @else
                            ---
                        @endif
                    </span>
                </td>
                {{-- DJLEVEL BIGGINER --}}
                <td @if ($music_data?->sp_b_cleartype !== $type) style='display:none;' @endif>
                    @if ($music_data->sp_b_djlevel == 'A')
                        <span class="rank A">A</span>
                    @elseif ($music_data->sp_b_djlevel == 'AA')
                        <span class="rank AA">AA</span>
                    @elseif ($music_data->sp_b_djlevel == 'AAA')
                        <span class="rank AAA">AAA</span>
                    @elseif ($music_data->sp_b_djlevel == '---')
                        <span class="rank">---</span>
                    @else
                        <span class="rank">{{ $music_data->sp_b_djlevel }}</span>
                    @endif
                </td>
                {{-- スコアグラフ BIGGINER --}}
                <td style="width:100px;padding:0 0 0 0;@if ($music_data?->sp_b_cleartype !== $type) display:none; @endif">
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
										@if ($music_data->sp_b_score == 0 || $score_data?->{'sp_b_notes'} == 0) 0%
										@else
											{{ round(($music_data->sp_b_score / ($score_data?->{'sp_b_notes'} * 2)) * 100, 2) }}% @endif">
                                    </div>
                                </div>
                            </div>
                            <p>
                                @if ($music_data->sp_b_score == 0 || $score_data?->{'sp_b_notes'} == 0)
                                    0 %
                                    @else{{ round(($music_data->sp_b_score / ($score_data?->{'sp_b_notes'} * 2)) * 100, 2) }}%
                                @endif
                            </p>
                        </div>
                    </div>
                </td>

                <td @if ($music_data?->sp_b_cleartype !== $type) style='display:none;' @endif>{{ $music_data->sp_b_misscount }}
                </td>
        </tr>

        <tr>
            {{-- クリアランプ NORMAL --}}
            <td class="lamp" @if ($music_data?->sp_n_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_n_cleartype == 'NO PLAY')
                    <span class="lamp noplay"></span>
                @elseif ($music_data->sp_n_cleartype == 'FAILED')
                    <span class="lamp failed"></span>
                @elseif ($music_data->sp_n_cleartype == 'EASY CLEAR')
                    <span class="lamp eclear"></span>
                @elseif ($music_data->sp_n_cleartype == 'ASSIST CLEAR')
                    <span class="lamp aclear"></span>
                @elseif ($music_data->sp_n_cleartype == 'CLEAR')
                    <span class="lamp nclear"></span>
                @elseif ($music_data->sp_n_cleartype == 'HARD CLEAR')
                    <span class="lamp hard"></span>
                @elseif ($music_data->sp_n_cleartype == 'EX HARD CLEAR')
                    <span class="lamp exhard"></span>
                @elseif ($music_data->sp_n_cleartype == 'FULLCOMBO CLEAR')
                    <span class="lamp fcombo"></span>
                @endif
            </td>
            {{-- レベル NORMAL --}}
            <td class="text-center"
                style="background-color: rgba(32,168,255,.3);@if ($music_data?->sp_n_cleartype !== $type) display:none; @endif">
                @if ($score_data?->{'sp_n_lv'} == '')
                    --
                @else
                    <span class="level n">{{ $score_data->{'sp_n_lv'} }}</span>
                @endif
            </td>
            {{-- クリアタイプ NORMAL --}}
            <td @if ($music_data?->sp_n_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_n_cleartype == 'NO PLAY')
                    <span class="clear noplay">{{ $music_data->sp_n_cleartype }}</span>
                @elseif ($music_data->sp_n_cleartype == 'FAILED')
                    <span class="clear failed">{{ $music_data->sp_n_cleartype }}</span>
                @elseif ($music_data->sp_n_cleartype == 'EASY CLEAR')
                    <span
                        class="clear eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $music_data->sp_n_cleartype) }}</span>
                @elseif ($music_data->sp_n_cleartype == 'ASSIST CLEAR')
                    <span
                        class="clear aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $music_data->sp_n_cleartype) }}</span>
                @elseif ($music_data->sp_n_cleartype == 'CLEAR')
                    <span class="clear nclear">{{ $music_data->sp_n_cleartype }}</span>
                @elseif ($music_data->sp_n_cleartype == 'HARD CLEAR')
                    <span
                        class="clear hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $music_data->sp_n_cleartype) }}</span>
                @elseif ($music_data->sp_n_cleartype == 'EX HARD CLEAR')
                    <span
                        class="clear exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $music_data->sp_n_cleartype) }}</span>
                @elseif ($music_data->sp_n_cleartype == 'FULLCOMBO CLEAR')
                    <span class="clear fcombo">{{ str_replace(' CLEAR', '', $music_data->sp_n_cleartype) }}</span>
                @endif
            </td>
            {{-- スコア NORMAL --}}
            <td style="text-align: center;line-height: 0.9;@if ($music_data?->sp_n_cleartype !== $type) display:none; @endif">
                {{ $music_data->sp_n_score }}<br>
                <span style="font-size: 10px; ">

                    @if ($score_data?->{'sp_n_notes'} == '')
                    @elseif ($music_data->sp_n_djlevel == 'A')
                        AA -{{ ceil($score_data?->{'sp_n_notes'} * 2 * 0.834) - $music_data->sp_n_score }}
                    @elseif ($music_data->sp_n_djlevel == 'AA' && $music_data->sp_n_score < $score_data?->{'sp_n_notes'} * 2 * 0.889)
                        AA +{{ ceil($music_data->sp_n_score - $score_data?->{'sp_n_notes'} * 2 * 0.834) }}
                    @elseif ($music_data->sp_n_djlevel == 'AA')
                        AAA {{ ceil($score_data?->{'sp_n_notes'} * 2 * 0.889) - $music_data->sp_n_score }}
                    @elseif ($music_data->sp_n_djlevel == 'AAA' && $music_data->sp_n_score < $score_data?->{'sp_n_notes'} * 2 * 0.944)
                        AAA +{{ ceil($music_data->sp_n_score - $score_data?->{'sp_n_notes'} * 2 * 0.889) }}
                    @elseif ($music_data->sp_n_djlevel == 'AAA' && $music_data->sp_n_score > $score_data?->{'sp_n_notes'} * 2 * 0.944)
                        MAX {{ ceil($score_data?->{'sp_n_notes'} * 2) - $music_data->sp_n_score }}
                    @else
                        ---
                    @endif
                </span>
            </td>
            {{-- DJLEVEL NORMAL --}}
            <td @if ($music_data?->sp_n_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_n_djlevel == 'A')
                    <span class="rank A">A</span>
                @elseif ($music_data->sp_n_djlevel == 'AA')
                    <span class="rank AA">AA</span>
                @elseif ($music_data->sp_n_djlevel == 'AAA')
                    <span class="rank AAA">AAA</span>
                @elseif ($music_data->sp_n_djlevel == '---')
                    <span class="rank">---</span>
                @else
                    <span class="rank">{{ $music_data->sp_n_djlevel }}</span>
                @endif
            </td>
            {{-- スコアグラフ NORMAL --}}
            <td style="width:100px;padding:0 0 0 0;@if ($music_data?->sp_n_cleartype !== $type) display:none; @endif">
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
										@if ($music_data->sp_n_score == 0) 0%
										@else
										{{ round(($music_data->sp_n_score / ($score_data?->{'sp_n_notes'} * 2)) * 100, 2) }}% @endif">
                                </div>
                            </div>
                        </div>
                        <p>
                            @if ($music_data->sp_n_score == 0)
                                0 %
                            @else
                                {{ round(($music_data->sp_n_score / ($score_data?->{'sp_n_notes'} * 2)) * 100, 2) }} %
                            @endif
                        </p>
                    </div>
                </div>
            </td>
            <td @if ($music_data?->sp_n_cleartype !== $type) style='display:none;' @endif>{{ $music_data->sp_n_misscount }}</td>
        </tr>
        {{-- HYPER --}}
        <tr>
            {{-- クリアランプ HYPER --}}
            <td class="lamp" @if ($music_data?->sp_h_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_h_cleartype == 'NO PLAY')
                    <span class="lamp noplay"></span>
                @elseif ($music_data->sp_h_cleartype == 'FAILED')
                    <span class="lamp failed"></span>
                @elseif ($music_data->sp_h_cleartype == 'EASY CLEAR')
                    <span class="lamp eclear"></span>
                @elseif ($music_data->sp_h_cleartype == 'ASSIST CLEAR')
                    <span class="lamp aclear"></span>
                @elseif ($music_data->sp_h_cleartype == 'CLEAR')
                    <span class="lamp nclear"></span>
                @elseif ($music_data->sp_h_cleartype == 'HARD CLEAR')
                    <span class="lamp hard"></span>
                @elseif ($music_data->sp_h_cleartype == 'EX HARD CLEAR')
                    <span class="lamp exhard"></span>
                @elseif ($music_data->sp_h_cleartype == 'FULLCOMBO CLEAR')
                    <span class="lamp fcombo"></span>
                @endif
            </td>

            <td class="text-center"
                style="background-color: rgba(255,174,0,.3);@if ($music_data?->sp_h_cleartype !== $type) display:none; @endif">
                @if ($score_data?->{'sp_h_lv'} == '')
                    --
                @else
                    <span class="level h">{{ $score_data->{'sp_h_lv'} }}</span>
                @endif
            </td>

            {{-- クリアタイプ HYPER --}}
            <td @if ($music_data?->sp_h_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_h_cleartype == 'NO PLAY')
                    <span class="clear noplay">{{ $music_data->sp_h_cleartype }}</span>
                @elseif ($music_data->sp_h_cleartype == 'FAILED')
                    <span class="clear failed">{{ $music_data->sp_h_cleartype }}</span>
                @elseif ($music_data->sp_h_cleartype == 'EASY CLEAR')
                    <span
                        class="clear eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $music_data->sp_h_cleartype) }}</span>
                @elseif ($music_data->sp_h_cleartype == 'ASSIST CLEAR')
                    <span
                        class="clear aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $music_data->sp_h_cleartype) }}</span>
                @elseif ($music_data->sp_h_cleartype == 'CLEAR')
                    <span class="clear nclear">{{ $music_data->sp_h_cleartype }}</span>
                @elseif ($music_data->sp_h_cleartype == 'HARD CLEAR')
                    <span
                        class="clear hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $music_data->sp_h_cleartype) }}</span>
                @elseif ($music_data->sp_h_cleartype == 'EX HARD CLEAR')
                    <span
                        class="clear exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $music_data->sp_h_cleartype) }}</span>
                @elseif ($music_data->sp_h_cleartype == 'FULLCOMBO CLEAR')
                    <span class="clear fcombo">{{ str_replace(' CLEAR', '', $music_data->sp_h_cleartype) }}</span>
                @endif
            </td>
            {{-- スコア HYPER --}}
            <td class="text-nowrap"
                style="text-align: center;line-height: 0.9;@if ($music_data?->sp_h_cleartype !== $type) display:none; @endif">
                {{ $music_data->sp_h_score }}<br>
                <span style="font-size: 10px;">
                    @if ($score_data?->{'sp_h_notes'} == '')
                    @elseif ($music_data->sp_h_djlevel == 'A')
                        AA -{{ ceil($score_data?->{'sp_h_notes'} * 2 * 0.834) - $music_data->sp_h_score }}
                    @elseif ($music_data->sp_h_djlevel == 'AA' && $music_data->sp_h_score < $score_data?->{'sp_h_notes'} * 2 * 0.889)
                        AA +{{ ceil($music_data->sp_h_score - $score_data?->{'sp_h_notes'} * 2 * 0.834) }}
                    @elseif ($music_data->sp_h_djlevel == 'AA')
                        AAA {{ ceil($score_data?->{'sp_h_notes'} * 2 * 0.889) - $music_data->sp_h_score }}
                    @elseif ($music_data->sp_h_djlevel == 'AAA' && $music_data->sp_h_score < $score_data?->{'sp_h_notes'} * 2 * 0.944)
                        AAA +{{ ceil($music_data->sp_h_score - $score_data?->{'sp_h_notes'} * 2 * 0.889) }}
                    @elseif ($music_data->sp_h_djlevel == 'AAA' && $music_data->sp_h_score > $score_data?->{'sp_h_notes'} * 2 * 0.944)
                        MAX {{ ceil($score_data?->{'sp_h_notes'} * 2) - $music_data->sp_h_score }}
                    @else
                        ---
                    @endif
                </span>
            </td>
            {{-- DJLEVEL HYPER --}}
            <td @if ($music_data?->sp_h_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_h_djlevel == 'A')
                    <span class="rank A">A</span>
                @elseif ($music_data->sp_h_djlevel == 'AA')
                    <span class="rank AA">AA</span>
                @elseif ($music_data->sp_h_djlevel == 'AAA')
                    <span class="rank AAA">AAA</span>
                @elseif ($music_data->sp_h_djlevel == '---')
                    <span class="rank">---</span>
                @else
                    <span class="rank">{{ $music_data->sp_h_djlevel }}</span>
                @endif
            </td>
            {{-- スコアグラフ HYPER --}}
            <td style="width:100px;padding:0 0 0 0;@if ($music_data?->sp_h_cleartype !== $type) display:none; @endif">
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
										@if ($music_data->sp_h_score == 0 || $score_data?->{'sp_h_notes'} == 0) 0%
										@else
										{{ round(($music_data->sp_h_score / ($score_data?->{'sp_h_notes'} * 2)) * 100, 2) }}% @endif">
                                </div>
                            </div>
                        </div>
                        <p>
                            @if ($music_data->sp_h_score == 0 || $score_data?->{'sp_h_notes'} == 0)
                                0 %
                                @else{{ round(($music_data->sp_h_score / ($score_data?->{'sp_h_notes'} * 2)) * 100, 2) }}%
                            @endif
                        </p>
                    </div>
                </div>
            </td>
            <td @if ($music_data?->sp_h_cleartype !== $type) style='display:none;' @endif>{{ $music_data->sp_h_misscount }}
            </td>
        </tr>

        {{-- ANOTHER --}}
        <tr>
            {{-- クリアランプ ANOTHER --}}
            <td class="lamp" @if ($music_data?->sp_a_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_a_cleartype == 'NO PLAY')
                    <span class="lamp noplay"></span>
                @elseif ($music_data->sp_a_cleartype == 'FAILED')
                    <span class="lamp failed"></span>
                @elseif ($music_data->sp_a_cleartype == 'EASY CLEAR')
                    <span class="lamp eclear"></span>
                @elseif ($music_data->sp_a_cleartype == 'ASSIST CLEAR')
                    <span class="lamp aclear"></span>
                @elseif ($music_data->sp_a_cleartype == 'CLEAR')
                    <span class="lamp nclear"></span>
                @elseif ($music_data->sp_a_cleartype == 'HARD CLEAR')
                    <span class="lamp hard"></span>
                @elseif ($music_data->sp_a_cleartype == 'EX HARD CLEAR')
                    <span class="lamp exhard"></span>
                @elseif ($music_data->sp_a_cleartype == 'FULLCOMBO CLEAR')
                    <span class="lamp fcombo"></span>
                @endif
            </td>
            <td class="text-center"
                style="background-color: rgba(255,0,0,.3);@if ($music_data?->sp_a_cleartype !== $type) display:none; @endif">
                @if ($score_data?->{'sp_a_lv'} == '')
                    --
                @else
                    <span class="level a">{{ $score_data->{'sp_a_lv'} }}</span>
                @endif
            </td>
            {{-- クリアタイプ ANOTHER --}}
            <td @if ($music_data?->sp_a_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_a_cleartype == 'NO PLAY')
                    <span class="clear noplay">{{ $music_data->sp_a_cleartype }}</span>
                @elseif ($music_data->sp_a_cleartype == 'FAILED')
                    <span class="clear failed">{{ $music_data->sp_a_cleartype }}</span>
                @elseif ($music_data->sp_a_cleartype == 'EASY CLEAR')
                    <span
                        class="clear eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $music_data->sp_a_cleartype) }}</span>
                @elseif ($music_data->sp_a_cleartype == 'ASSIST CLEAR')
                    <span
                        class="clear aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $music_data->sp_a_cleartype) }}</span>
                @elseif ($music_data->sp_a_cleartype == 'CLEAR')
                    <span class="clear nclear">{{ $music_data->sp_a_cleartype }}</span>
                @elseif ($music_data->sp_a_cleartype == 'HARD CLEAR')
                    <span
                        class="clear hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $music_data->sp_a_cleartype) }}</span>
                @elseif ($music_data->sp_a_cleartype == 'EX HARD CLEAR')
                    <span
                        class="clear exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $music_data->sp_a_cleartype) }}</span>
                @elseif ($music_data->sp_a_cleartype == 'FULLCOMBO CLEAR')
                    <span class="clear fcombo">{{ str_replace(' CLEAR', '', $music_data->sp_a_cleartype) }}</span>
                @endif
            </td>
            {{-- スコア ANOTHER --}}
            <td class="text-nowrap"
                style="text-align: center;line-height: 0.9;@if ($music_data?->sp_a_cleartype !== $type) display:none; @endif">
                {{ $music_data->sp_a_score }}<br>
                <span style="font-size: 10px;">
                    @if ($score_data?->{'sp_a_notes'} == '')
                    @elseif ($music_data->sp_a_djlevel == 'A')
                        AA -{{ ceil($score_data?->{'sp_a_notes'} * 2 * 0.834) - $music_data->sp_a_score }}
                    @elseif ($music_data->sp_a_djlevel == 'AA' && $music_data->sp_a_score < $score_data?->{'sp_a_notes'} * 2 * 0.889)
                        AA +{{ ceil($music_data->sp_a_score - $score_data?->{'sp_a_notes'} * 2 * 0.834) }}
                    @elseif ($music_data->sp_a_djlevel == 'AA')
                        AAA {{ ceil($score_data?->{'sp_a_notes'} * 2 * 0.889) - $music_data->sp_a_score }}
                    @elseif ($music_data->sp_a_djlevel == 'AAA' && $music_data->sp_a_score < $score_data?->{'sp_a_notes'} * 2 * 0.944)
                        AAA +{{ ceil($music_data->sp_a_score - $score_data?->{'sp_a_notes'} * 2 * 0.889) }}
                    @elseif ($music_data->sp_a_djlevel == 'AAA' && $music_data->sp_a_score > $score_data?->{'sp_a_notes'} * 2 * 0.944)
                        MAX {{ ceil($score_data?->{'sp_a_notes'} * 2) - $music_data->sp_a_score }}
                    @else
                        ---
                    @endif
                </span>
            </td>
            {{-- DJLEVEL ANOTHER --}}
            <td @if ($music_data?->sp_a_cleartype !== $type) style='display:none;' @endif>
                @if ($music_data->sp_a_djlevel == 'A')
                    <span class="rank A">A</span>
                @elseif ($music_data->sp_a_djlevel == 'AA')
                    <span class="rank AA">AA</span>
                @elseif ($music_data->sp_a_djlevel == 'AAA')
                    <span class="rank AAA">AAA</span>
                @elseif ($music_data->sp_a_djlevel == '---')
                    <span class="rank">---</span>
                @else
                    <span class="rank">{{ $music_data->sp_a_djlevel }}</span>
                @endif
            </td>
            {{-- スコアグラフ ANOTHER --}}
            <td style="width:100px;padding:0 0 0 0;@if ($music_data?->sp_a_cleartype !== $type) display:none; @endif">
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
                                    style="flex-basis:@if ($music_data->sp_a_score == 0 || $score_data?->{'sp_a_notes'} == 0) 0%@else{{ round(($music_data->sp_a_score / ($score_data?->{'sp_a_notes'} * 2)) * 100, 2) }}% @endif">
                                </div>
                            </div>
                        </div>
                        <p>
                            @if ($music_data->sp_a_score == 0 || $score_data?->{'sp_a_notes'} == 0)
                                0 %
                                @else{{ round(($music_data->sp_a_score / ($score_data?->{'sp_a_notes'} * 2)) * 100, 2) }}
                                %
                            @endif
                        </p>
                    </div>
                </div>
            </td>
            <td @if ($music_data?->sp_a_cleartype !== $type) style='display:none;' @endif>{{ $music_data->sp_a_misscount }}
            </td>
        </tr>

        {{-- LEGGENDARIA --}}
        <tr>
            <td class="lamp"@if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') style='display:none;' @endif>
                {{-- クリアランプ LEGGENDARIA --}}
                @if ($music_data->sp_l_cleartype == 'NO PLAY')
                    <span class="lamp noplay"></span>
                @elseif ($music_data->sp_l_cleartype == 'FAILED')
                    <span class="lamp failed"></span>
                @elseif ($music_data->sp_l_cleartype == 'EASY CLEAR')
                    <span class="lamp eclear"></span>
                @elseif ($music_data->sp_l_cleartype == 'ASSIST CLEAR')
                    <span class="lamp aclear"></span>
                @elseif ($music_data->sp_l_cleartype == 'CLEAR')
                    <span class="lamp nclear"></span>
                @elseif ($music_data->sp_l_cleartype == 'HARD CLEAR')
                    <span class="lamp hard"></span>
                @elseif ($music_data->sp_l_cleartype == 'EX HARD CLEAR')
                    <span class="lamp exhard"></span>
                @elseif ($music_data->sp_l_cleartype == 'FULLCOMBO CLEAR')
                    <span class="lamp fcombo"></span>
                @endif
            </td>
            <td class="text-center"
                style="background-color: rgba(206,0,214,.3);@if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') display:none; @endif">
                @if ($score_data?->{'sp_l_lv'} == '')
                    --
                @else
                    <span class="level l">{{ $score_data->{'sp_l_lv'} }}</span>
                @endif
            </td>
            {{-- クリアタイプ LEGGENDARIA --}}
            <td @if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') style='display:none;' @endif>
                @if ($music_data?->{'sp_l_lv'} == '')
                    --
                @elseif ($music_data->sp_l_cleartype == 'NO PLAY')
                    <span class="clear noplay">{{ $music_data->sp_l_cleartype }}</span>
                @elseif ($music_data->sp_l_cleartype == 'FAILED')
                    <span class="clear failed">{{ $music_data->sp_l_cleartype }}</span>
                @elseif ($music_data->sp_l_cleartype == 'EASY CLEAR')
                    <span
                        class="clear eclear">{{ str_replace('EASY CLEAR', 'E-CLEAR', $music_data->sp_l_cleartype) }}</span>
                @elseif ($music_data->sp_l_cleartype == 'ASSIST CLEAR')
                    <span
                        class="clear aclear">{{ str_replace('ASSIST CLEAR', 'A-CLEAR', $music_data->sp_l_cleartype) }}</span>
                @elseif ($music_data->sp_l_cleartype == 'CLEAR')
                    <span class="clear nclear">{{ $music_data->sp_l_cleartype }}</span>
                @elseif ($music_data->sp_l_cleartype == 'HARD CLEAR')
                    <span
                        class="clear hard">{{ str_replace('HARD CLEAR', 'H-CLEAR', $music_data->sp_l_cleartype) }}</span>
                @elseif ($music_data->sp_l_cleartype == 'EX HARD CLEAR')
                    <span
                        class="clear exhard">{{ str_replace('EX HARD CLEAR', 'EXH-CLEAR', $music_data->sp_l_cleartype) }}</span>
                @elseif ($music_data->sp_l_cleartype == 'FULLCOMBO CLEAR')
                    <span class="clear fcombo">{{ str_replace(' CLEAR', '', $music_data->sp_l_cleartype) }}</span>
                @endif
            </td>
            {{-- スコア LEGGENDARIA --}}
            <td style="text-align: center;line-height: 0.9;@if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') display:none; @endif">
                {{ $music_data->sp_l_score }}<br>
                <span style="font-size: 10px;">
                    @if ($score_data?->{'sp_l_notes'} == '')
                    @elseif ($music_data->sp_l_djlevel == 'A')
                        AA -{{ ceil($score_data?->{'sp_l_notes'} * 2 * 0.834) - $music_data->sp_l_score }}
                    @elseif ($music_data->sp_l_djlevel == 'AA' && $music_data->sp_l_score < $score_data?->{'sp_l_notes'} * 2 * 0.889)
                        AA +{{ ceil($music_data->sp_l_score - $score_data?->{'sp_l_notes'} * 2 * 0.834) }}
                    @elseif ($music_data->sp_l_djlevel == 'AA')
                        AAA {{ ceil($score_data?->{'sp_l_notes'} * 2 * 0.889) - $music_data->sp_l_score }}
                    @elseif ($music_data->sp_l_djlevel == 'AAA' && $music_data->sp_l_score < $score_data?->{'sp_l_notes'} * 2 * 0.944)
                        AAA +{{ ceil($music_data->sp_l_score - $score_data?->{'sp_l_notes'} * 2 * 0.889) }}
                    @elseif ($music_data->sp_l_djlevel == 'AAA' && $music_data->sp_l_score > $score_data?->{'sp_l_notes'} * 2 * 0.944)
                        MAX {{ ceil($score_data?->{'sp_l_notes'} * 2) - $music_data->sp_l_score }}
                    @else
                        ---
                    @endif
                </span>
            </td>
            {{-- DJLEVEL LEGGENDARIA --}}
            <td @if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') style='display:none;' @endif>
                @if ($music_data->sp_l_djlevel == 'A')
                    <span class="rank A">A</span>
                @elseif ($music_data->sp_l_djlevel == 'AA')
                    <span class="rank AA">AA</span>
                @elseif ($music_data->sp_l_djlevel == 'AAA')
                    <span class="rank AAA">AAA</span>
                @elseif ($music_data->sp_l_djlevel == '---')
                    <span class="rank">---</span>
                @else
                    <span class="rank">{{ $music_data->sp_l_djlevel }}</span>
                @endif
            </td>
            {{-- スコアグラフ LEGGENDARIA --}}
            <td style="width:100px;padding:0 0 0 0;@if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') display:none; @endif">
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
										@if ($music_data->sp_l_score == 0 || $score_data?->{'sp_l_notes'} == 0 || $score_data?->{'sp_l_notes'} == '') 0%
										@else{{ round(($music_data->sp_l_score / ($score_data?->{'sp_l_notes'} * 2)) * 100, 2) }}% @endif">
                                </div>
                            </div>
                        </div>
                        <p>
                            @if ($music_data->sp_l_score == 0 || $score_data?->{'sp_l_notes'} == 0 || $score_data?->{'sp_l_notes'} == '')
                                0 %
                                @else{{ round(($music_data->sp_l_score / ($score_data?->{'sp_l_notes'} * 2)) * 100, 2) }}%
                            @endif
                        </p>
                    </div>
                </div>
            </td>

            <td @if ($music_data?->sp_l_cleartype !== $type || $score_data?->{'sp_l_lv'} == '') style='display:none;' @endif>{{ $music_data->sp_l_misscount }}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="mt-1 mb-1 row jstify-content-center">
        {{ $scoresUnion->links('pagination::bootstrap-4') }}
    </div>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</div>
