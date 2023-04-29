@section('header')
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{route('index')}}">
                    {{-- <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABN5JREFUeNrsnN1R4zAQgEUm75cOzlQQd4BTwZm3eyNUAKkgUAFQgc3bvREqwKkAUwGmA18FnBbWcxpjWyt5JYexd0aTScCW8mm1P/IqQkwySR85+o6Dfv8jIvkSyrZQPi5ky49+i3yUgBDKmWxxDUxdStky2R4lrNQLIBzcFjsvZMcbz2Cg78jictCqjRzvzrkGyYE+4OyBgBqvZMelQzCgJTeyrRlud26rTSaAAvnyqnzkDJLsCyYi0SwlUzmWYy1ML5qRSX7ePFM+AiP5hDPNpjWyAZgHZjjCVhNnhv9/X3sfon3ggPMBnGlJsYkpoKzhs0s0pH3grBFO6PC7Fs4B4TJr6mjbA86NA3vzZWJtjfTM4pqmQCxCI25qb8DWXDrUGIByKuGsbG8yt7jmRXH3qlxAzGHgwl0sKYByjhE1i3e1AdTWsYkdWigwo44vWzRMQtzlRCSYjJP4nGmJCRNtqNkyky+USe2DWCwwHJs3L0ZJC1xLV9oQHDQgFwNskL8df1seAqBiYEBdSzIcHJBNPuNRQs7Ux9ZIC58q3jBBYKi7BPLDUtGoRYMhh72iqyEALQ5Biwh/B00TFEjGgLhV2LDfEFvBYO9gd/LKhQaFnoBE2NcSg0luBxAAdF3EPRcHIggE2okQXuKpyuvm3IAWjEsmRiCx8G+/SsoTkEGWGPN+s62QEuvZECODdS8bZN3HmH3vOpJgds0RBpv4Nhp0wggKvFGKrdp2jdAwh4wOoaziH5gMk2D3YIw0AsvrRhOhBQjrhwIt0qQj11Vg6TuSjgaCtquBe++4bM+1L2Rkg4YKEi3k51DJqs4m7D1CyHzsKpgCCsTIZALEDEi3nVFOGtQt+dgBhdMSa3fxFDijXmLaGIi7PvC7AYrECMUEkC46zccOSOfByrED0i2xwvPYo4MBRKz9eRuzBlEAjXqJUdR51Eb65zfTIDZ7OOdaYi6CRLR9NnvTb74BRb60B1Oa6tBKMLQqzgkDpmyz5gxgYBJsD63UZUl5rMxlg5wmqaAxskHF6xNjbAPa9yrve+kDEEXNXyzhXMmXZ0dB38fTW6jF7vOwgQtQYQEnEUznPAjaZH3ohgJoyQ0INWft0dZan0yaEVXVCBAcTmkbDLrurfAv1Wki/0tMfdaNSyfpMO6J4Rgz8VmJAYf3jqD1gYSHZ1jjoICqPbqlg9pDMcjgFe9kS+uFBgzF6nB8a089x8pRvFAoX/5C878XhPtBTHXaUYHxi2HMiRxvRomTOOuDbgj2KiTAXmnKUziMe1XAxWKDtB4KTwzGDEHnrmtWsR/dJGSCdkBmTdnn4gAUthje3MIjxh3ejzrrUCR1T9SkLQegPUFdvxjZFk3QzWzQFK8oB34pIccOy+sKohYt+gJKLdb4rkdSCzCewSNiSzAdoeSEqtejalHcC1DDeXmKtA3ujnh9FUxuDYwyaOy18v7WoK/eXuzaAE7eVv6GsG+FG9mo3g+XeO++SIDwC1M72xBgc+8+pi1lvZS+Uq44iNLZra54Emd2xQgpxZrrrr7axnSuKwk2ymswbnhu8SZGP3aC3iMhxk/GcBr6gxTlTPw/n3FHqZc2TvxaXK71L8HgL71shdnGfCF6/i4QVawyY9SkKmPf4WB77f8i+OpwS9NJwcqbPvoAM8kkPPJPgAEAyEmTr+M2lQ0AAAAASUVORK5CYII="
                        width="30" height="30" class="d-inline-block align-top mr-1" alt="Honoka"> --}}
                    iidxKeep
                </a>

                <div class="text-end">
                    {{-- Authentication Links --}}
                    @guest
                        <a class="btn btn-outline-light me-2" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                        <a class="btn btn-outline-warning me-2" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    @else
                        <div class="btn-group">
                            <a id="navbarDropdown" class="btn btn-outline-light me-2 dropdown-toggle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (isset(Auth::user()->name))
                                    {{ Auth::user()->name }}
                                @else
                                    {{ Auth::user()->email }}
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest

                    {{-- テーマ変更 ドロップダウン --}}
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" id="bd-theme" type="button"
                            aria-expanded="false" data-bs-toggle="dropdown">
                            <svg class="bi theme-icon-active" width="0.3em" height="1em" fill="currentColor">
                                <use href="#moon-stars-fill"></use>
                            </svg>
                            <span id="bd-theme-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                                    class="bi bi-sun-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                </svg></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-the me-text">
                            <li>
                                <button type="button" class="dropdown-item" data-bs-theme-value="light"
                                    aria-pressed="false">
                                    <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                        <use href="#sun-fill"></use>
                                    </svg>ライト
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-bs-theme-value="dark"
                                    aria-pressed="false">
                                    <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                        <use href="#moon-stars-fill"></use>
                                    </svg>ダーク
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item active" data-bs-theme-value="auto"
                                    aria-pressed="true">
                                    <svg class="bi me-2 theme-icon" width="1em" height="1em" fill="currentColor">
                                        <use href="#circle-half"></use>
                                    </svg>オート
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endsection
