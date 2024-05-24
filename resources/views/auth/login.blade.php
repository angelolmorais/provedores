@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ __('messages.title_oei') }}</h4>
                    </div>
                    <div class="card-body">

                    @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @error('error')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email_address">{{ __('messages.email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-envelope"></span></span>
                                    </span>
                                    <input type="mail" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.mail.error') }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('messages.pass.label') }}</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><span class="fa fa-lock"></span></span>
                                    </span>
                                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ __('messages.pass.error') }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> {{ __('messages.remember') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">
                                    {{ __('messages.login') }}
                                </button>
                                <a class="btn btn-link btn-block" href="{{ route('password.request') }}">{{ __('messages.forgot_password') }}</a>
                            </div>

                            <hr>

                            <div class="form-group">
                                <a class="btn btn-primary btn-block" href="{{ route('register') }}">{{ __('messages.new_user') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
