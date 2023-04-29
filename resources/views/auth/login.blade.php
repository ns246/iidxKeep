@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-1 justify-content-left">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">{{ __('ログイン') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-secondary">
                                        {{ __('ログイン') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="ms-2 link-body-emphasis d-inline-flex text-decoration-none small rounded"
                                            href="{{ route('password.request') }}">
                                            {{ __('パスワードを忘れた方') }}
                                        </a>
                                    @endif


                                </div>
                            </div>
                        </form>
						<div class="mt-5 text-border">他のアカウントでログイン</div>
						<div class="flex text-center mt-3">
							<a href="{{ url('auth/redirect') }}">
								<img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
							</a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
