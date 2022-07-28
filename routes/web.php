<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()){
        return Redirect::to('/dashboard');
    }
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('index');

Route::prefix('classroom')->group(function () {
    Route::get('', [ClassroomController::class, 'index']);
    Route::get('create', [ClassroomController::class, 'create']);
    Route::post('store', [ClassroomController::class, 'store']);
    Route::get('edit/{id}', [ClassroomController::class, 'edit']);
    Route::post('update/{id}', [ClassroomController::class, 'update']);
    Route::delete('delete/{id}', [ClassroomController::class, 'destroy']);
});
Route::prefix('teacher')->group(function () {
    Route::get('', [TeacherController::class, 'index']);
    Route::get('create', [TeacherController::class, 'create']);
    Route::post('store', [TeacherController::class, 'store']);
    Route::get('edit/{id}', [TeacherController::class, 'edit']);
    Route::post('update/{id}', [TeacherController::class, 'update']);
    Route::delete('delete/{id}', [TeacherController::class, 'destroy']);
    // Todo: differences between these ways and which one has better performance.
    //Route::post('ajax/fetchSubjects', [TeacherController::class, 'fetchSubjects'])->name('ajax.fetchSubjects');
    Route::get('ajax/fetchSubjects/{id}', [TeacherController::class, 'getSubjects']);
});
Route::prefix('student')->group(function () {
    Route::get('', [StudentController::class, 'index']);
    Route::get('create', [StudentController::class, 'create']);
    Route::post('store', [StudentController::class, 'store']);
    Route::get('edit/{id}', [StudentController::class, 'edit']);
    Route::post('update/{id}', [StudentController::class, 'update']);
    Route::delete('delete/{id}', [StudentController::class, 'destroy']);
});
Route::prefix('subject')->group(function () {
    Route::get('', [SubjectController::class, 'index']);
    Route::get('create', [SubjectController::class, 'create']);
    Route::post('store', [SubjectController::class, 'store']);
    Route::get('edit/{id}', [SubjectController::class, 'edit']);
    Route::post('update/{id}', [SubjectController::class, 'update']);
    Route::delete('delete/{id}', [SubjectController::class, 'destroy']);
});
Route::prefix('manager')->group(function () {
    Route::get('', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('edit/{id}', [UserController::class, 'edit']);
    Route::post('update/{id}', [UserController::class, 'update']);
    Route::delete('delete/{id}', [UserController::class, 'destroy']);
});

require __DIR__.'/auth.php';
