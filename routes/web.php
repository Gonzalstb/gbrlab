<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanbanController;

Route::get('/', [KanbanController::class, 'index'])->name('kanban.index');
Route::post('/kanban/update-status', [KanbanController::class, 'updateStatus'])->name('kanban.updateStatus');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de tareas (CRUD)
    Route::resource('tasks', App\Http\Controllers\TaskController::class);

    // Rutas de usuario (perfil, etc.)
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    // Puedes agregar más rutas de usuario aquí
});

// Ruta para cambiar el idioma
Route::get('/locale/{locale}', function ($locale) {
    if (in_array($locale, ['es', 'en'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    if (request()->has('json')) {
        $messages = include base_path('lang/' . app()->getLocale() . '/messages.php');
        return response()->json([
            'locale' => app()->getLocale(),
            'translations' => $messages,
        ]);
    }
    return back();
})->name('locale.set');

require __DIR__.'/auth.php';
