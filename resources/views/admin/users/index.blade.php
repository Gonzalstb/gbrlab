@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">@lang('Usuarios')</h1>
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h5 class="mb-0">@lang('Listado de usuarios')</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>@lang('ID')</th>
                            <th>@lang('Nombre')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Rol')</th>
                            <th>@lang('Acciones')</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Ejemplo de usuario --}}
                        <tr>
                            <td>1</td>
                            <td>Administrador</td>
                            <td>admin@test.com</td>
                            <td><span class="badge bg-primary">Admin</span></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info rounded-pill px-3">@lang('Ver')</a>
                                <a href="#" class="btn btn-sm btn-warning rounded-pill px-3">@lang('Editar')</a>
                                <a href="#" class="btn btn-sm btn-danger rounded-pill px-3">@lang('Eliminar')</a>
                            </td>
                        </tr>
                        {{-- Fin ejemplo --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 