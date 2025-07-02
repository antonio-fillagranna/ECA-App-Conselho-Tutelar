<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/contato', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contato', [ContactController::class, 'submit'])->name('contact.submit');

Route::middleware(['auth', 'verified'])->group(function () {
    // TODO: retirar a rota '/dashboard', só consegui redireciona-la para about, mas não substitui-la
    Route::get('/dashboard', function () {
        return redirect()->route('about');
    })->name('dashboard');
    Route::get('/sobre', function () {
        return view('about');
    })->name('about');
    Route::get('/eca', function () {
        return view('eca');
    })->name('eca.show'); 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])->name('quiz.submit');
    Route::get('/quiz/result', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/leaderboard', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard');
});

require __DIR__.'/auth.php';