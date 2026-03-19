<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [ScoreController::class, 'index'])->name('scores.index');
Route::post('/search', [ScoreController::class, 'check'])->name('scores.check');

Route::get('/report', [ReportController::class, 'index'])->name('reports.index');
Route::get('/report/chart', [ReportController::class, 'chart'])->name('reports.chart');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/settings', function () {
    return view('pages.setting');
})->name('settings.index');
