<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Student\GuildController;
use App\Http\Controllers\Student\ProjectController;
use App\Http\Controllers\Admin\PreRegisterController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\GuildPostController;
use App\Http\Controllers\Student\ProjectTaskController;
use App\Http\Controllers\Admin\LearningModuleController;
use App\Http\Controllers\Student\GuildPostCommentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Student\LearningModuleController as StudentLearningModuleController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;

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
    if (Auth::user()) {
        return redirect('/home');
    }

    return view('welcome');
})->name('welcome');

Route::prefix('pre-register')
    ->as('pre-register.')
    ->group(function () {
        Route::get('step-one', [PreRegisterController::class, 'create'])->name('step-one.create');
        Route::post('step-one', [PreRegisterController::class, 'store'])->name('step-one.store');
        Route::get('step-two/{pre_register}', [PreRegisterController::class, 'stepTwo'])->name('step-two.create');
        Route::post('step-two/{pre_register}', [PreRegisterController::class, 'stepTwoStore'])->name('step-two.store');
        Route::get('step-three/{pre_register}', [PreRegisterController::class, 'stepThree'])->name('step-three.create');
        Route::post('step-three/{pre_register}', [PreRegisterController::class, 'stepThreeStore'])->name('step-three.store');
        Route::get('step-four/{pre_register}', [PreRegisterController::class, 'stepFour'])->name('step-four.create');
        Route::post('step-four/{pre_register}', [PreRegisterController::class, 'stepFourStore'])->name('step-four.store');
        Route::get('step-five/{pre_register}', [PreRegisterController::class, 'stepFive'])->name('step-five.create');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('privacy-policy', function () {
        return view('users.privacy-policy');
    })->name('privacy-policy');

    Route::get('terms-and-conditions', function () {
        return view('users.term-of-service');
    })->name('terms-and-conditions');

    Route::middleware(['role:student'])
        ->prefix('student')
        ->as('student.')
        ->group(function () {
            Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::prefix('guilds')
                ->as('guilds.')
                ->group(function () {
                    Route::post('{guild}/join', [GuildController::class, 'join'])->name('join');
                    Route::post('{guild}/leave', [GuildController::class, 'leave'])->name('leave');
                    Route::get('{guild}/members', [GuildController::class, 'members'])->name('members');
                    Route::get('{guild}/about', [GuildController::class, 'about'])->name('about');
                    Route::get('my-guilds', [GuildController::class, 'myGuild'])->name('my.guilds');
                });
            Route::prefix('profile')->as('profile.')->group(function () {
                Route::get('', [StudentProfileController::class, 'edit'])->name('edit');
                Route::get('password-update', action: [StudentProfileController::class, 'updatePassword'])->name('password-update');
                Route::patch('update', action: [StudentProfileController::class, 'update'])->name('update');
            });

            Route::prefix('projects')
                ->as('projects.')
                ->group(function () {
                    Route::get('{project}/tasks', [ProjectController::class, 'tasks'])->name('tasks');
                    Route::get('{project}/create', [ProjectController::class, 'createTask'])->name('create.task');
                    Route::post('task/{project_task}/status', [ProjectController::class, 'updateStatusTask'])->name('task.update.status');
                    Route::get('{project}/participants', [ProjectController::class, 'participantIndex'])->name('participant.index');
                    Route::post('addParticipants', [ProjectController::class, 'addParticipant'])->name('participant.add');
                    Route::post('/tasks', [ProjectController::class, 'storeTask'])->name('store.task');
                    Route::get('my-projects', [ProjectController::class, 'myProject'])->name('my.projects');
                });
            Route::resource('guilds', GuildController::class);
            Route::resource('guild-post', GuildPostController::class)->except('index');
            Route::resource('guild-post-comments', GuildPostCommentController::class)->except('index');
            Route::resource('projects', ProjectController::class);
            Route::resource('learning-modules',  StudentLearningModuleController::class);
        });
});

Route::middleware(['role:admin'])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('students', StudentController::class);

        Route::prefix('pre-register')->as('pre-register.')->group(function () {
            Route::get('', [PreRegisterController::class, 'index'])->name('index');
            Route::post('{pre_register}/approve', [PreRegisterController::class, 'approve'])->name('approve');
            Route::post('{pre_register}/reject', [PreRegisterController::class, 'reject'])->name('reject');
        });

        Route::resource('learning-modules', LearningModuleController::class);
    });



require __DIR__ . '/auth.php';
