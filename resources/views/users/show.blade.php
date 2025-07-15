@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Perfil de {{ $user->name }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Rol:</strong> {{ $user->role->name ?? 'Sin rol' }}</p>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Tareas asignadas a {{ $user->name }}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Título</th>
                                    <th>Estado</th>
                                    <th>Fecha límite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user->assignedTasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td><span class="badge bg-secondary">{{ ucfirst(__($task->status)) }}</span></td>
                                        <td>{{ $task->due_date }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No tiene tareas asignadas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Tareas creadas por {{ $user->name }}</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Título</th>
                                    <th>Estado</th>
                                    <th>Fecha límite</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user->tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td><span class="badge bg-secondary">{{ ucfirst(__($task->status)) }}</span></td>
                                        <td>{{ $task->due_date }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No ha creado tareas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 