@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('messages.maintenance_title') }}</div>
                    <div class="card-body">
                        <p class="text-center">{{ __('messages.maintenance_message') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
