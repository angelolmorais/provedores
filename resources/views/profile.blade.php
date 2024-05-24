@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif

                <h4>{{ __('messages.update_profile') }}</h4>
                        <form action="{{ route('profile.update', auth()->id()) }}" method="POST" class="row">
                            @csrf
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">{{ __('messages.name') }}:</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="business">{{ __('messages.business_name') }}:</label>
                                    <input type="text" id="business" class="form-control" name="business" value="{{ auth()->user()->business }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('messages.email') }}</label>
                                    <input type="email" id="email" class="form-control" name="email" value="{{ auth()->user()->email }}" @if(auth()->user()->cannot('update-email')) readonly @endif required>
                                </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="company">{{ __('messages.company_type') }}:</label>
                                    <select id="company" class="form-control" name="company" required>
                                        <option value="">{{ __('messages.select_option') }}</option>
                                        <option value="N" @if(auth()->user()->company === 'N') selected @endif>{{ __('messages.national') }}</option>
                                        <option value="I" @if(auth()->user()->company === 'I') selected @endif>{{ __('messages.international') }}</option>
                                    </select>
                                </div>
                                <div class="form-group" id="cnpj_field">
                                    <label for="cnpj">{{ __('messages.cnpj') }}:</label>
                                    <input type="text" id="cnpj" class="form-control" name="cnpj" value="{{ auth()->user()->cnpj }}" @if(auth()->user()->cannot('update-cpf')) readonly @endif>
                                </div>
                                <div class="form-group" id="nit_field">
                                    <label for="nit">{{ __('messages.nit') }}:</label>
                                    <input type="text" id="nit" class="form-control" name="nit" value="{{ auth()->user()->nit }}">
                                </div>

                                <div class="form-group">
                                    <label for="business_activity">{{ __('messages.business_activity') }}:</label>
                                    <select id="activity" class="form-control select2-multiple" name="activity[]" multiple required>
                                        @foreach ($activities as $activity)
                                            <option value="{{ $activity->id }}" {{ in_array($activity->id, explode(',', $user->activity)) ? 'selected' : '' }}>
                                                {{ $activity->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <script>
                                    $(document).ready(function() {
                                                $('.select2-multiple').select2({
                                                    placeholder: "{{ __('messages.select_activity') }}",
                                                    allowClear: true
                                                });

                                            });
                                    </script>
                                </div>


                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">{{ __('messages.country') }}:</label>
                                    <select id="country" class="form-control" name="country" required>
                                        <option value="">{{ __('messages.select_country') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ $user->country == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="city">{{ __('messages.city') }}:</label>
                                    <input type="text" id="city" class="form-control" name="city"  value="{{ auth()->user()->city }}"   required>
                                </div>

                            <div class="form-group">
                                    <label for="change_password"><b>{{ __('messages.change_password') }}</b>. </label>
                                    <a href="#" data-toggle="modal" data-target="#changePasswordModal">
                                        {{ __('messages.click_here_to_change_password') }}
                                    </a>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">{{ __('messages.telephone') }}</label>
                                    <input type="text" id="telephone" class="form-control" name="telephone"  value="{{ auth()->user()->telephone }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="state_province">{{ __('messages.state_province') }}:</label>
                                    <input type="text" id="state_province" class="form-control" name="state_province"value="{{ auth()->user()->state_province }}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{ __('messages.address') }}:</label>
                                    <input type="text" id="address" class="form-control" name="address" value="{{ auth()->user()->address }}" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="privacy_policy" value="{{ auth()->user()->privacy_policy }}" required> {{ __('messages.agree_privacy_policy') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('messages.update_profile') }}
                                </button>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const companyTypeSelect = document.getElementById('company');
        const cnpjField = document.getElementById('cnpj_field');
        const nitField = document.getElementById('nit_field');

        function toggleFields() {
            cnpjField.style.display = (companyTypeSelect.value === 'N') ? 'block' : 'none';
            nitField.style.display = (companyTypeSelect.value === 'I') ? 'block' : 'none';
        }

        toggleFields();

        companyTypeSelect.addEventListener('change', toggleFields);
    });
</script>


<!-- Modal de alteração de senha -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">{{ __('messages.change_password') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('profile.password.update', ['user' => Auth::user()]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="current_password">{{ __('messages.current_password') }}:</label>
                        <input type="password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                        @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="new_password">{{ __('messages.new_password') }}:</label>
                        <input type="password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="text-muted">{{ __('messages.password_requirements') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">{{ __('messages.confirm_new_password') }}:</label>
                        <input type="password" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" required>
                        @error('new_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="text-muted">{{ __('messages.confirm_password') }}</small>
                    </div>
                    <div class="alert alert-warning">
                        {{ __('messages.password_current_alert') }}
                    </div>
                    <div class="alert alert-info">
                        {{ __('messages.password_requirements_alert') }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('messages.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.update_password') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const newPasswordInput = document.getElementById('new_password');
        const newPasswordConfirmationInput = document.getElementById('new_password_confirmation');
        const updatePasswordButton = document.querySelector('#changePasswordModal button[type="submit"]');

        function validatePasswords() {
            const newPassword = newPasswordInput.value;
            const newPasswordConfirmation = newPasswordConfirmationInput.value;
            if (newPassword !== newPasswordConfirmation) {
                newPasswordConfirmationInput.setCustomValidity("{{ __('messages.passwords_do_not_match') }}");
            } else {
                newPasswordConfirmationInput.setCustomValidity('');
            }
        }

        newPasswordInput.addEventListener('input', validatePasswords);
        newPasswordConfirmationInput.addEventListener('input', validatePasswords);

        updatePasswordButton.addEventListener('click', function(event) {
            if (newPasswordInput.value !== newPasswordConfirmationInput.value) {
                event.preventDefault();
                newPasswordConfirmationInput.setCustomValidity("{{ __('messages.passwords_do_not_match') }}");
            }
        });
    });
</script>





@endsection


