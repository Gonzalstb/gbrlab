@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">@lang('Crear tarea (Admin)')</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.tasks.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">@lang('Título')</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">@lang('Descripción')</label>
                            <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">@lang('Etiquetas')</label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="@lang('Separadas por coma')">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="due_date" class="form-label">@lang('Fecha límite')</label>
                                <input type="date" class="form-control" id="due_date" name="due_date">
                            </div>
                            <div class="col">
                                <label for="estimated_time" class="form-label">@lang('Tiempo estimado (h)')</label>
                                <input type="number" class="form-control" id="estimated_time" name="estimated_time" min="0" placeholder="@lang('No especificado')">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="assigned_to" class="form-label">@lang('Asignar a')</label>
                                <select class="form-select" id="assigned_to" name="assigned_to">
                                    <option value="">@lang('Selecciona un usuario')</option>
                                    {{-- Aquí irán los usuarios --}}
                                </select>
                            </div>
                            <div class="col">
                                <label for="priority" class="form-label">@lang('Prioridad')</label>
                                <select class="form-select" id="priority" name="priority">
                                    <option value="low">@lang('Baja')</option>
                                    <option value="medium">@lang('Media')</option>
                                    <option value="high">@lang('Alta')</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('Guardar')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 