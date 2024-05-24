<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard.index') }}">
            <img src="{{ asset('images/OEI.png')}}" class="img-responsive center-block logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (auth()->check())
            <ul class="navbar-nav mr-auto">
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">{{ __('messages.nav.profile') }}</a>
                </li>
                -->
                <li class="nav-item">
                    <b><a class="nav-link" href="{{ route('dashboard.index') }}">{{ __('messages.nav.biddings') }}</a></b>
                </li>
            </ul>
            @endif
            <ul class="navbar-nav ml-auto">
                @if (auth()->check())
<!--
                    <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="nav-link dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                       <i class="fas fa-envelope fa-lg"></i>

                        <span class="badge bg-green">1</span>


                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1" x-placement="bottom-start" style="position: absolute; transform: translate3d(-141px, 17px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span>
                                050/2023<br>
                                Enviar Documentos até as 29/09/2023 11:54
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
-->
             <li class="nav-item dropdown open" style="padding-left: 15px;">


                    <a  href="{{ route('profile') }}" class="nav-link dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(15px, 21px, 0px);">
                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> {{ __('messages.nav.profile') }}</a>
                        <!--<a class="dropdown-item" href="javascript:;"><i class="fas fa-question-circle" aria-hidden="true"></i> Help</a>-->
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> {{ __('messages.nav.logout') }}</a>
                    </div>
                </li>
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <div class="dropdown">
                    <a  href="{{ route('profile') }}" class="nav-link dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper(session()->get('locale', 'pt')) }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="{{ route('changeLang', ['locale' => 'pt']) }}">PT</a>
                            <a class="dropdown-item" href="{{ route('changeLang', ['locale' => 'es']) }}">ES</a>
                            <a class="dropdown-item" href="{{ route('changeLang', ['locale' => 'en']) }}">EN</a>
                        </div>
                    </div>
                </li>


                @else
<!--
                @if (Route::currentRouteName() == 'login')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus"></i> {{ __('messages.nav.register') }}
                            </a>
                        </li>
                    @elseif (Route::currentRouteName() == 'register')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> {{ __('messages.nav.login') }}
                            </a>
                        </li>
                    @endif
-->
                @endauth
            </ul>

        </div>
    </div>
</nav>
