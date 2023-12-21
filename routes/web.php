<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RespondenController;
use App\Http\Controllers\SurveyController;
use App\Models\Question;
use App\Models\Responden;
use Illuminate\Support\Facades\Auth;
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
    $questions = Question::orderBy('serial_number', 'asc')->get();
    return view('guest.survey', compact('questions'));
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', function() {
        $totalResponden = Responden::count();
        $totalQuestion = Question::count();
        return view('dashboard', compact('totalResponden','totalQuestion'));
    })->name('dashboard');
    Route::resource('responden', RespondenController::class);
    Route::get('answers/{id}', [RespondenController::class, 'answers'])->name('answers');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('question', QuestionController::class);

 });
Route::get('login', function() {
    return view('auth.login');
})->name('login');
Route::post('postLogin', [AuthController::class, 'login'])->name('postLogin');
Route::post('submit', [SurveyController::class, 'submit'])->name('submitSurvey');
