<?php

use App\Http\Controllers\{DashboardController, Question, QuestionController};
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {

    if (app()->isLocal()) {

        auth()->loginUsingId(1);

        return to_route('dashboard');
    }

    return view('welcome');
})->name('home');

Route::get('dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
Route::post('/question/like/{question}', Question\LikeController::class)->name('question.like');
Route::post('/question/unlike/{question}', Question\UnlikeController::class)->name('question.unlike');
Route::put('/question/publish/{question}', Question\PublishController::class)->name('question.publish');

require __DIR__ . '/auth.php';
