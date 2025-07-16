@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">@lang('messages.admin_tasks')</h1>
    <div class="row g-4">
        {{-- Ejemplo de tarjeta de tarea admin --}}
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-lg border-0 rounded-4">
                <div class="card-header bg-transparent border-0 d-flex justify-content-between align-items-center pb-0">
                    <div>
                        <h5 class="card-title mb-1">@lang('messages.task_title')</h5>
                        <small class="text-muted">@lang('messages.task_description')</small>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-info">@lang('messages.label')</span>
                        <span class="badge bg-secondary">@lang('messages.other_label')</span>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-8">
                            <p class="mb-1"><strong>@lang('messages.estimated_time')</strong> {{ isset($task) && $task->estimated_time !== null ? $task->estimated_time . 'h' : __('messages.not_specified') }}</p>
                            <p class="mb-1"><strong>@lang('messages.spent_time')</strong> {{ isset($task) && $task->spent_time !== null ? $task->spent_time . 'h' : __('messages.not_specified') }}</p>
                            <p class="mb-1"><strong>@lang('messages.assigned_to')</strong> Juan Pérez</p>
                        </div>
                        <div class="col-4 text-end">
                            <span class="badge bg-success">@lang('messages.priority'): @lang('messages.high')</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 text-end pt-0">
                    <a href="#" class="btn btn-primary btn-sm rounded-pill px-3">@lang('messages.view')</a>
                    <a href="#" class="btn btn-secondary btn-sm rounded-pill px-3">@lang('messages.edit')</a>
                    <a href="#" class="btn btn-danger btn-sm rounded-pill px-3">@lang('messages.delete')</a>
                </div>
            </div>
        </div>
        {{-- Fin ejemplo --}}
    </div>
</div>
@endsection 