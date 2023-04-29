<div class="mt-1 mb-1 row jstify-content-center">
    {{ $musiclistUnion->links('pagination::bootstrap-5') }}
	{{-- {{ dd($musiclistUnion)}} --}}
</div>
<div class="mb-5">
    <table class="table caption-top">
        <tr>
            <th scope="row" style="min-width:250px; max-width: 500px;">TITLE</th>
            <th scope="row" style="width: 10px;"></th>
            <th scope="row" style="width: 32px;">LV</th>
            <th scope="row" class="resp ctype_hide">CLEAR</th>
            <th scope="row">SCORE</th>
            <th scope="row"></th>
            <th scope="row" style="width: 150px;">RATE</th>
            <th scope="row">MISS</th>
            @foreach ($musiclistUnion as $music_data)
                @php include $param; @endphp
        </tr>
        @if (isset($music_data->sp_b_lv))
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
                <td class="text-center" style="background-color: rgba(121,209,0,.2);">
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
        @endforeach



    </table>
    <div class="mt-1 mb-1 row jstify-content-center">
        {{ $musiclistUnion->links('pagination::bootstrap-4') }}
    </div>
</div>
