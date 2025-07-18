@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-white text-center display-5">@lang('messages.users')</h1>
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <h5 class="mb-0">@lang('messages.user_list')</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>@lang('messages.id')</th>
                        <th>@lang('messages.name')</th>
                        <th>@lang('messages.email')</th>
                        <th>@lang('messages.role')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Ejemplo de usuario --}}
                    <tr>
                        <td>@lang('messages.admin')</td>
                        <td>Administrador</td>
                        <td>admin@test.com</td>
                        <td><span class="badge bg-primary">Admin</span></td>
                        <td>
                                <a href="#" class="btn btn-sm btn-info rounded-pill px-3">@lang('messages.view')</a>
                                <a href="#" class="btn btn-sm btn-warning rounded-pill px-3">@lang('messages.edit')</a>
                                <a href="#" class="btn btn-sm btn-danger rounded-pill px-3">@lang('messages.delete')</a>
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