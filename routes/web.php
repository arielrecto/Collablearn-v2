<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\GuildController;
use App\Http\Controllers\Student\GuildPostCommentController;
use App\Http\Controllers\Student\GuildPostController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Student\ProjectTaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware(['role:student'])->prefix('student')->as('student.')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::prefix('guilds')->as('guilds.')->group(function () {
            Route::post('{guild}/join', [GuildController::class, 'join'])->name('join');
            Route::post('{guild}/leave', [GuildController::class, 'leave'])->name('leave');
            Route::get('{guild}/members', [GuildController::class, 'members'])->name('members');
            Route::get('{guild}/about', [GuildController::class, 'about'])->name('about');
        });


        Route::prefix('projects')->as('projects.')->group(function () {
            Route::get('{project}/tasks', [ProjectController::class, 'tasks'])->name('tasks');
            Route::get('{project}/create', [ProjectController::class, 'createTask'])->name('create.task');
            Route::post('task/{project_task}/status', [ProjectController::class, 'updateStatusTask'])->name('task.update.status');
            Route::get('{project}/participants', [ProjectController::class, 'participantIndex'])->name('participant.index');
            Route::post('addParticipants', [ProjectController::class, 'addParticipant'])->name('participant.add');
            Route::post('/tasks', [ProjectController::class, 'storeTask'])->name('store.task');
        });
        Route::resource('guilds', GuildController::class);
        Route::resource('guild-post', GuildPostController::class)->except('index');
        Route::resource('guild-post-comments', GuildPostCommentController::class)->except('index');
        Route::resource('projects', ProjectController::class);
    });
});



require __DIR__ . '/auth.php';
