@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">@lang('messages.admin_panel')</h1>
    <div class="row g-4 mb-4 justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 text-bg-primary rounded-4">
                <div class="card-body text-center py-4">
                    <h5 class="card-title mb-2">@lang('messages.registered_users')</h5>
                    <p class="card-text display-6 fw-bold">{{ $usersCount ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 text-bg-success rounded-4">
                <div class="card-body text-center py-4">
                    <h5 class="card-title mb-2">@lang('messages.total_tasks')</h5>
                    <p class="card-text display-6 fw-bold">{{ $tasksCount ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-auto">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary btn-lg me-2 rounded-pill px-4">@lang('messages.manage_users')</a>
            <a href="{{ route('admin.tasks.index') }}" class="btn btn-outline-success btn-lg rounded-pill px-4">@lang('messages.manage_tasks')</a>
        </div>
    </div>
</div>
@endsection 