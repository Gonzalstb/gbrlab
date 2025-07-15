use App\Http\Controllers\Api\TaskKanbanController;

Route::get('/kanban-tasks', [TaskKanbanController::class, 'index']); 