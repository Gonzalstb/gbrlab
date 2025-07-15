@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">@lang('Panel de Administración')</h1>
    <div class="row g-4 mb-4 justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 text-bg-primary rounded-4">
                <div class="card-body text-center py-4">
                    <h5 class="card-title mb-2">@lang('Usuarios registrados')</h5>
                    <p class="card-text display-6 fw-bold">{{ $usersCount ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg border-0 text-bg-success rounded-4">
                <div class="card-body text-center py-4">
                    <h5 class="card-title mb-2">@lang('Tareas totales')</h5>
                    <p class="card-text display-6 fw-bold">{{ $tasksCount ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-auto">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary btn-lg me-2 rounded-pill px-4">@lang('Gestionar usuarios')</a>
            <a href="{{ route('admin.tasks.index') }}" class="btn btn-outline-success btn-lg rounded-pill px-4">@lang('Gestionar tareas')</a>
        </div>
    </div>
</div>
@endsection 