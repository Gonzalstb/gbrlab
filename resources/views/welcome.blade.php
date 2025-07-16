@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:70vh;">
    <div class="text-center">
        <h1 class="fw-bold text-white display-3 mb-4">{{ __('messages.welcome_title') }}</h1>
        <p class="lead text-white-50 mb-4">{{ __('messages.welcome_subtitle') }}</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow">{{ __('messages.start') }}</a>
    </div>
</div>
@endsection
