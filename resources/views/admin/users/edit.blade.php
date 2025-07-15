@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="mb-0">@lang('Editar usuario')</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update', $user->id ?? 1) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('Nombre')</label>
                            <input type="text" class="form-control rounded-pill" id="name" name="name" value="{{ $user->name ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">@lang('Email')</label>
                            <input type="email" class="form-control rounded-pill" id="email" name="email" value="{{ $user->email ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="role_id" class="form-label">@lang('Rol')</label>
                            <select class="form-select rounded-pill" id="role_id" name="role_id">
                                <option value="">@lang('Selecciona un rol')</option>
                                {{-- Aquí irán los roles --}}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">@lang('Contraseña (dejar en blanco para no cambiar)')</label>
                            <input type="password" class="form-control rounded-pill" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-info btn-lg rounded-pill px-4 text-white">@lang('Actualizar')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 