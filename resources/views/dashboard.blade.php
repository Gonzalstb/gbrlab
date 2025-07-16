@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:60vh;">
    <h1 class="fw-bold text-white mb-4 display-4 text-center">{{ __('messages.main_panel') }}</h1>
    <div class="card shadow-lg border-0" style="max-width: 420px;">
        <div class="card-body text-center">
            <h5 class="card-title mb-3">{{ __('messages.logged_in') }}</h5>
            <p class="card-text text-muted">{{ __('messages.welcome_dashboard') }}</p>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-lg rounded-pill mt-3 px-4">{{ __('messages.tasks') }}</a>
        </div>
    </div>
</div>
@endsection
