@component('mail::message')
# Nueva tarea asignada

Hola {{ $task->assignedTo->name ?? 'Usuario' }},

Se te ha asignado una nueva tarea:

@component('mail::panel')
**Título:** {{ $task->title }}  
**Descripción:** {{ $task->description }}  
**Fecha límite:** {{ $task->due_date }}  
**Prioridad:** {{ ucfirst($task->priority) }}  
@endcomponent

**Tiempo estimado:** {{ $task->estimated_time ?? '-' }} horas  
**Asignada por:** {{ $assigner->name }}

@component('mail::button', ['url' => url('/tasks/'.$task->id)])
Ver tarea
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
