@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">@lang('Editar tarea')</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task->id ?? 1) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('Título')</label>
                            <input type="text" class="form-control rounded-pill" id="title" name="title" value="{{ $task->title ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('Descripción')</label>
                            <textarea class="form-control rounded-4" id="description" name="description" rows="2">{{ $task->description ?? '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">@lang('Etiquetas')</label>
                            <input type="text" class="form-control rounded-pill" id="tags" name="tags" value="{{ $task->tags ?? '' }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="due_date" class="form-label">@lang('Fecha límite')</label>
                                <input type="date" class="form-control rounded-pill" id="due_date" name="due_date" value="{{ $task->due_date ?? '' }}">
                            </div>
                            <div class="col">
                                <label for="estimated_time" class="form-label">@lang('Tiempo estimado (h)')</label>
                                <input type="number" class="form-control rounded-pill" id="estimated_time" name="estimated_time" min="0" value="{{ old('estimated_time', $task->estimated_time ?? '') }}">
                            </div>
                            <div class="col">
                                <label for="spent_time" class="form-label">@lang('Tiempo gastado (h)')</label>
                                <input type="number" class="form-control rounded-pill" id="spent_time" name="spent_time" min="0" value="{{ old('spent_time', $task->spent_time ?? '') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="assigned_to" class="form-label">@lang('Asignar a')</label>
                                <select class="form-select rounded-pill" id="assigned_to" name="assigned_to" required>
                                    <option value="">@lang('Selecciona un usuario')</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if(($task->assigned_to ?? '') == $user->id) selected @endif>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('assigned_to')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="priority" class="form-label">@lang('Prioridad')</label>
                                <select class="form-select rounded-pill" id="priority" name="priority">
                                    <option value="low" @if(($task->priority ?? '')=='low') selected @endif>@lang('Baja')</option>
                                    <option value="medium" @if(($task->priority ?? '')=='medium') selected @endif>@lang('Media')</option>
                                    <option value="high" @if(($task->priority ?? '')=='high') selected @endif>@lang('Alta')</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-lg rounded-pill px-4 text-white">@lang('Actualizar')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 