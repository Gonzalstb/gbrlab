@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-0">{{ $task->title ?? __('messages.task_title') }}</h5>
                        <small class="text-muted">{{ $task->description ?? __('messages.task_description') }}</small>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-info">Etiqueta</span>
                        <span class="badge bg-secondary">Otra etiqueta</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p><strong>@lang('messages.estimated_time')</strong> {{ $task->estimated_time !== null ? $task->estimated_time . 'h' : __('messages.not_specified') }}</p>
                            <p><strong>@lang('messages.spent_time')</strong> {{ $task->spent_time !== null ? $task->spent_time . 'h' : __('messages.not_specified') }}</p>
                            <p><strong>@lang('messages.assigned_to')</strong> {{ $task->assignedTo->name ?? 'Juan Pérez' }}</p>
                        </div>
                        <div class="col-4 text-end">
                            <span class="badge bg-success">@lang('messages.priority') {{ ucfirst($task->priority ?? __('messages.high')) }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('tasks.edit', $task->id ?? 1) }}" class="btn btn-secondary btn-sm">@lang('messages.edit')</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm">@lang('messages.back')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 