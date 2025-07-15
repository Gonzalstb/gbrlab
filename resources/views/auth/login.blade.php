@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:70vh;">
    <div class="card shadow-lg border-0 rounded-4" style="max-width: 400px; background: rgba(255,255,255,0.95);">
        <div class="card-body p-4">
            <h2 class="fw-bold text-center mb-4 text-primary">@lang('Iniciar sesión')</h2>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
                <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control rounded-pill mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
                <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control rounded-pill mt-1" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
        </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
            @if (Route::has('password.request'))
                        <a class="small text-primary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill">{{ __('Log in') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
