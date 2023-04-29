@section('submenu')
    <div class="col-sm">
        <ul class="list-unstyled ps-0">
            {{-- DJ DATA --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    DJ DATA
                </button>
                <div class="collapse" id="home-collapse" style="">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('profile') }}"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
                        <li><a href="{{ route('recent') }}"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Recent</a></li>
                    </ul>
                </div>
            </li>

            {{-- LEVEL --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#level-collapse" aria-expanded="false">
                    LEVEL
                </button>
                <div class="collapse" id="level-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ms-4 pb-1 small">
                        <div class="pt-2 d-flex ">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 1) }}'">1</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 2) }}'">2</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 3) }}'">3</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 4) }}'">4</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 5) }}'">5</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 6) }}'">6</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 7) }}'">7</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 8) }}'">8</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 9) }}'">9</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 10) }}'">10</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 11) }}'">11</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('level', 12) }}'">12</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('level.beginner') }}'">BEGINNER</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('level.leggendaria') }}'">LEGGENDARIA</button>
                        </div>
                    </ul>
                </div>
            </li>

            {{-- CLEAR --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#clear-collapse" aria-expanded="false">
                    CLEAR
                </button>
                <div class="collapse" id="clear-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ms-4 pb-1 small">
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.fcombo') }}'">F-COMBO</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.exhard') }}'">EXH-CLEAR</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.hard') }}'">H-CLEAR</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.clear') }}'">CLEAR</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.eclear') }}'">E-CLEAR</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.aclear') }}'">A-CLEAR</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.failed') }}'">FAILED</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-50"
                                onclick="location.href='{{ route('clear.noplay') }}'">NO
                                PLAY</button>
                        </div>
                    </ul>
                </div>
            </li>

            {{-- RANK --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#rank-collapse" aria-expanded="false">
                    RANK
                </button>
                <div class="collapse" id="rank-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ms-4 pb-1 small">
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.aaa') }}'">AAA</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.aa') }}'">AA</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.a') }}'">A</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.b') }}'">B</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.c') }}'">C</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.d') }}'">D</button>
                        </div>
                        <div class="pt-2 d-flex">
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.e') }}'">E</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.f') }}'">F</button>
                            <button type="button" class="btn btn-outline-light bg-secondary rounded-0 flex-fill w-25"
                                onclick="location.href='{{ route('rank.noscore') }}'">NO SCORE</button>
                    </ul>
                </div>
            </li>

            {{-- VERSION --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#version-collapse" aria-expanded="false">
                    VERSION
                </button>
                <div class="collapse" id="version-collapse">
                    <div  class="mb-3 d-inline-flex">
                        <select class="form-select ms-4 pe-2 pb-1" style="width:210px" id="VersionSelect">
                            <option value="{{ route('index') }}/version/30">RESIDENT</option>
                            <option value="{{ route('index') }}/version/29">CastHour</option>
                            <option value="{{ route('index') }}/version/28">BISTROVER</option>
                            <option value="{{ route('index') }}/version/27">HEROIC VERSE</option>
                            <option value="{{ route('index') }}/version/26">Rootage</option>
                            <option value="{{ route('index') }}/version/25">CANNON BALLERS</option>
                            <option value="{{ route('index') }}/version/24">SINOBUZ</option>
                            <option value="{{ route('index') }}/version/23">copula</option>
                            <option value="{{ route('index') }}/version/22">PENDUAL</option>
                            <option value="{{ route('index') }}/version/21">SPADA</option>
                            <option value="{{ route('index') }}/version/20">tricoro</option>
                            <option value="{{ route('index') }}/version/19">Lincle</option>
                            <option value="{{ route('index') }}/version/18">Resort Anthem</option>
                            <option value="{{ route('index') }}/version/17">SIRIUS</option>
                            <option value="{{ route('index') }}/version/16">EMPRESS</option>
                            <option value="{{ route('index') }}/version/15">DJ TROOPERS</option>
                            <option value="{{ route('index') }}/version/14">GOLD</option>
                            <option value="{{ route('index') }}/version/13">DistorteD</option>
                            <option value="{{ route('index') }}/version/12">HAPPY SKY</option>
                            <option value="{{ route('index') }}/version/11">IIDX RED</option>
                            <option value="{{ route('index') }}/version/10">10th style</option>
                            <option value="{{ route('index') }}/version/9">9th style</option>
                            <option value="{{ route('index') }}/version/8">8th style</option>
                            <option value="{{ route('index') }}/version/7">7th style</option>
                            <option value="{{ route('index') }}/version/6">6th style</option>
                            <option value="{{ route('index') }}/version/5">5th style</option>
                            <option value="{{ route('index') }}/version/4">4th style</option>
                            <option value="{{ route('index') }}/version/3">3rd style</option>
                            <option value="{{ route('index') }}/version/2">2nd style</option>
                            <option value="{{ route('index') }}/version/1">substream</option>
                            <option value="{{ route('index') }}/version/0">1st style</option>
                        </select>
                        <button id="selectVersion" class="btn btn-secondary" onclick="verView()">表示</button>
                    </div>
                </div>
            </li>

            {{-- <li class="border-top my-3"></li> --}}
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    ACCOUNT
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                onclick="location.href='{{ route('account.profile') }}'">Profile</a></li>
                        <li><a href="#"
                                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Settings</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
@endsection
