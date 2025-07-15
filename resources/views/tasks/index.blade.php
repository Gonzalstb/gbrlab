@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">{{ __('Tareas') }}</h1>
    @php
        $statuses = [
            'to do' => __('To Do'),
            'in progress' => __('In Progress'),
            'doing' => __('Doing'),
            'testing' => __('Testing'),
            'done' => __('Done'),
        ];
    @endphp
    <div class="d-flex justify-content-center align-items-start flex-nowrap overflow-auto" style="gap: 1.5rem;">
        @foreach($statuses as $statusKey => $statusLabel)
            <div class="col-12 col-md-6 col-lg-2 flex-shrink-0 d-flex flex-column align-items-center">
                <div class="bg-white bg-opacity-10 rounded-4 p-2 mb-3 shadow-sm w-100" style="min-width: 220px; max-width: 260px;">
                    <h5 class="text-center fw-bold text-white mb-3">{{ $statusLabel }}</h5>
                    @php $filtered = $tasks->where('status', $statusKey); @endphp
                    @forelse($filtered as $task)
                        <div class="card h-100 shadow-lg border-0 rounded-4 mb-3">
                            <div class="card-body pt-2 text-center">
                                <div class="fw-bold mb-2">{{ $task->title }}</div>
                                <div class="text-muted small">{{ __('Asignado a:') }} {{ $task->assignedTo->name ?? '-' }}</div>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-end pt-0">
                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm rounded-pill px-3">{{ __('Ver') }}</a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm rounded-pill px-3">{{ __('Editar') }}</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-white-50 small">{{ __('Sin tareas') }}</div>
                    @endforelse
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 