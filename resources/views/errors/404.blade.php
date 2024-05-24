@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        @if (isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>{{ __('messages.error_404_title') }}</h2>
            </div>
            <div class="card-body">
                <p>{{ __('messages.error_404_message') }}</p>
            </div>
        </div>
    </div>
</main>
@endsection
