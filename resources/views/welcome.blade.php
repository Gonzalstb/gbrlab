@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:70vh;">
    <div class="text-center">
        <h1 class="fw-bold text-white display-3 mb-4">¡Bienvenido a Team Tasks!</h1>
        <p class="lead text-white-50 mb-4">Gestiona tus tareas y las de tu equipo de forma visual y eficiente.</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow">Comenzar</a>
    </div>
</div>
@endsection
