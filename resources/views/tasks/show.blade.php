@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title mb-0">{{ $task->title ?? 'Título de la tarea' }}</h5>
                        <small class="text-muted">{{ $task->description ?? 'Descripción breve de la tarea' }}</small>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-info">Etiqueta</span>
                        <span class="badge bg-secondary">Otra etiqueta</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <p><strong>@lang('Tiempo estimado:')</strong> {{ $task->estimated_time ?? '3h' }}</p>
                            <p><strong>@lang('Tiempo gastado:')</strong> {{ $task->spent_time ?? '1h 30m' }}</p>
                            <p><strong>@lang('Asignado a:')</strong> {{ $task->assignedTo->name ?? 'Juan Pérez' }}</p>
                        </div>
                        <div class="col-4 text-end">
                            <span class="badge bg-success">@lang('Prioridad:') {{ ucfirst($task->priority ?? 'alta') }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('tasks.edit', $task->id ?? 1) }}" class="btn btn-secondary btn-sm">@lang('Editar')</a>
                    <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm">@lang('Volver')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 