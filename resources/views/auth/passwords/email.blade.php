@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        @if (session('success'))
            <div class="alert alert-danger">
                {{ session('success') }}
            </div>
        @endif
        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ __('messages.sent') }}
                            </div>
                        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{ __('messages.forgot_password') }}</h4>
                    </div>
                    <div class="card-body">


                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">{{ __('messages.email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('messages.throttled') }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('messages.send_reset_link') }}</button>
                                <a href="{{ route('login') }}" class="btn btn-light">
                                    {{ __('messages.back') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection
