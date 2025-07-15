<nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
            <x-application-logo class="d-inline-block align-text-top" style="height:2rem;width:auto;" />
            <span class="fw-bold fs-4">Team Tasks</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}" href="{{ route('tasks.index') }}">{{ __('Tasks') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <!-- Dropdown de idioma -->
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-uppercase">{{ app()->getLocale() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                        <li><a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'es']) }}">Español</a></li>
                        <li><a class="dropdown-item" href="{{ route('locale.set', ['locale' => 'en']) }}">English</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>{{ Auth::check() ? Auth::user()->name : 'Invitado' }}</span>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Invitado') }}&background=1e3a5c&color=fff&size=32" class="rounded-circle" alt="avatar" width="32" height="32">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">{{ __('Cerrar sesión') }}</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
