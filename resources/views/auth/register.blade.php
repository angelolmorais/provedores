@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4>{{ __('messages.company_registration') }}</h4></div>
                    <div class="card-body">
                        @error('error')
                        <span>{{ $message }}</span>
                        @enderror
                        <form action="{{ route('register.post') }}" method="POST" class="row">
                            @csrf
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">{{ __('messages.name') }}:</label>
                                    <input type="text" id="name" class="form-control" name="name" required>
                                </div>

                                <div class="form-group">
                                    <label for="business">{{ __('messages.business_name') }}:</label>
                                    <input type="text" id="business" class="form-control" name="business" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('messages.email') }}</label>
                                    <input type="email" id="email" class="form-control" name="email" required>
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company">{{ __('messages.company_type') }}:</label>
                                    <select id="company" class="form-control" name="company" required>
                                    <option value="">{{ __('messages.select_option') }}</option> <!-- Cambiar "select_option" por la clave correspondiente en tus traducciones -->
                                    <option value="N">{{ __('messages.national') }}</option>
                                    <option value="I">{{ __('messages.international') }}</option>
                                    </select>
                                </div>
                                <div class="form-group" id="cnpj_field">
                                    <label for="cnpj">{{ __('messages.cnpj') }}:</label>
                                    <input type="text" id="cnpj" class="form-control" name="cnpj" >
                                </div>
                                <div class="form-group" id="nit_field">
                                    <label for="nit">{{ __('messages.nit') }}:</label>
                                    <input type="text" id="nit" class="form-control" name="nit" >
                                </div>

                                <div class="form-group">
                                    <label for="business_activity">{{ __('messages.business_activity') }}:</label>
                                    <input type="text" id="activity" class="form-control" name="activity" required>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">

                                <div class="form-group">
                                    <label for="country">{{ __('messages.country') }}:</label>
                                    <input type="text" id="country" class="form-control" name="country" required>
                                </div>

                                <div class="form-group">
                                    <label for="city">{{ __('messages.city') }}:</label>
                                    <input type="text" id="city" class="form-control" name="city" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('messages.password') }}:</label>
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>




                        </div>

                        <div class="col-md-6">

                                <div class="form-group">
                                    <label for="telephone">{{ __('messages.telephone') }}</label>
                                    <input type="text" id="telephone" class="form-control" name="telephone" required>
                                </div>
                                <div class="form-group">
                                    <label for="state_province">{{ __('messages.state_province') }}:</label>
                                    <input type="text" id="state_province" class="form-control" name="state_province" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{ __('messages.address') }}:</label>
                                    <input type="text" id="address" class="form-control" name="address" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="privacy_policy" required> {{ __('messages.agree_privacy_policy') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn btn-success">
                                    {{ __('messages.register') }}
                                </button>

                                <button type="submit" class="btn btn btn-default">
                                    {{ __('messages.login') }}
                                </button>
                        </div>
                        <div class="col-md-12">
                        <hr>
                        </div>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
    const companyTypeSelect = document.getElementById('company');
    const cnpjField = document.getElementById('cnpj_field');
    const nitField = document.getElementById('nit_field');

    nitField.style.display = cnpjField.style.display = 'none';

    companyTypeSelect.addEventListener('change', function() {
        cnpjField.style.display = (companyTypeSelect.value === 'N') ? 'block' : 'none';
        nitField.style.display = (companyTypeSelect.value === 'I') ? 'block' : 'none';
    });
});
    </script>
