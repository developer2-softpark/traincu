<nav class="bg-purple-300 shadow-lg navbar navbar-dark navbar-expand-lg sticky-top">
    <a class="text-white navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="mt-2 ml-auto navbar-nav mt-lg-0 nav-rtl">
            <li class="nav-item {{ active('home') }}">
                <a class="text-white nav-link" href="{{ route('home') }}">{{ __('frontend/navbar.home') }}</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link {{ active('truck-operator') }}" href="{{ route('truck-operator') }}">
                    {{ __('frontend/navbar.truck-operator') }}
                </a>
            </li>
            <li class="nav-item {{ active('blog') }}">
                <a class="text-white nav-link" href="{{ route('blog') }}">
                    {{ __('frontend/navbar.blog') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link {{ active('contact-us') }}" href="{{ route('contact-us') }}">
                    {{ __('frontend/navbar.contact-us') }}
                </a>
            </li>
            @auth
            <li class="nav-item">
                <a class="text-white nav-link {{ active('customer.dashboard') }}"
                    href="{{dashboardURL()}}">{{ __('frontend/navbar.dashboard') }}</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link text-uppercase" href="javascript:void(0)"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
            <li class="nav-item">
                <a class="text-white nav-link {{ active('auth.login') }}"
                    href="{{ route('auth.login') }}">{{ __('frontend/navbar.login') }}</a>
            </li>
            <li class="nav-item">
                <a class="text-white nav-link {{ active('auth.register') }}"
                    href="{{ route('auth.register') }}">{{ __('frontend/navbar.register') }}</a>
            </li>
            @endauth
            @auth
            <li class="nav-item dropdown mt-1">
                <a class="text-white nav-link dropdown-toggle d-flex align-items-center" href="javascript:void(0)"
                    data-toggle="dropdown">
                    <i class="icon-bell-alt position-absolute mt-1"></i>
                    @if (hasNotification(auth()->user()))
                    <span class="red-dot"></span>
                    @endif
                </a>
                @if (hasNotification(auth()->user()))
                <ul class="dropdown-menu dropdown-menu-right w-250p">
                    <li class="text-wrap">
                        <a class="dropdown-item d-flex align-items-center text-wrap"
                            href="{{ join('en', explode(app()->getLocale(), \Request::url(), 2)) }}">
                            Lorem ipsum dolor sit amet consectetur.
                        </a>
                    </li>
                </ul>
                @endif
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="text-white nav-link dropdown-toggle d-flex align-items-center" href="javascript:void(0)"
                    data-toggle="dropdown">
                    @if (app()->getLocale() == 'en')
                    <span>
                        <img class="lang-icon" src="{{ asset('images/flag/uk.svg') }}" alt="English" />
                    </span>
                    <span class="mx-1"> ENGLISH </span>
                    @else
                    <span>
                        <img class="lang-icon" src="{{ asset('images/flag/uae.svg') }}" alt="Arabic" />
                    </span>
                    <span class="mx-1"> العربية </span>
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ join('en', explode(app()->getLocale(), \Request::url(), 2)) }}">
                            <img class="lang-icon" src="{{ asset('images/flag/uk.svg') }}" alt="English" />
                            <span>English</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center"
                            href="{{ join('ar', explode(app()->getLocale(), \Request::url(), 2)) }}">
                            <img class="lang-icon" src="{{ asset('images/flag/uae.svg') }}" alt="English" />
                            <span>العربية</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>