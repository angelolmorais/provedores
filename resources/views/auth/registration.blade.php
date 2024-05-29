@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h4>{{ __('messages.company_registration') }}</h4></div>
                    <div class="card-body">
                    @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ __('messages.email_exists') }}<br>
                                @endforeach
                            </div>
                        @endif


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
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                                    <!--@error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('messages.unique', ['attribute' => __('messages.email')]) }}</strong>
                                        </span>
                                    @enderror-->
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="company">{{ __('messages.company_type') }}:</label>
                                    <select id="company" class="form-control" name="company" required>
                                    <option value="">{{ __('messages.select_option') }}</option>
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
                                <label for="country">{{ __('messages.country') }}:</label>
            <select id="country" class="form-control" name="country" required>
                <option value="">{{ __('messages.select_country') }}</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
                                </div>



                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">

                             <div class="form-group">
                                    <label for="activity">{{ __('messages.business_activity') }}:</label>
                                    <select id="activity" class="form-control select2-multiple" name="activity[]" multiple="multiple" required>
                <option value="">{{ __('messages.select_activity') }}</option>
            </select>
                                </div>


                                <script>
                                $(document).ready(function() {
                                            $('.select2-multiple').select2({
                                                placeholder: "{{ __('messages.select_activity') }}",
                                                allowClear: true
                                            });

                                        });

    $(document).ready(function () {
        $('#country').change(function () {
            var countryId = $(this).val();
            if (countryId) {
                // Fetch activities for the selected country
                $.ajax({
                    url: '/get-activities/' + countryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var activitiesDropdown = $('#activity');
                        activitiesDropdown.empty().append('<option value="">{{ __('messages.select_activity') }}</option>');

                        $.each(data.activities, function (id, name) {
                            activitiesDropdown.append('<option value="' + id + '">' + name + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            } else {
                // Reset the activities dropdown if no country is selected
                $('#activity').empty().append('<option value="">{{ __('messages.select_activity') }}</option>');
            }
        });
    });
</script>
                                </script>

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
                        <button type="submit" class="btn btn btn-primary">
                                    {{ __('messages.register') }}
                                </button>

                            <a href="{{ route('login') }}" class="btn btn-light">
                                {{ __('messages.back') }}
                            </a>
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
