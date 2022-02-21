<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
})->middleware('checkRole');

// Route::get('/', function () {
//     return view('layouts.admin');
// });

//ADMINISTRATOR
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin-dashboard');
    Route::get('/student', [AdminController::class, 'student'])->name('admin-student');
    Route::get('/position', [AdminController::class, 'position'])->name('admin-position');
    Route::get('/partylist', [AdminController::class, 'partylist'])->name('admin-partylist');
    Route::get('/candidate', [AdminController::class, 'candidate'])->name('admin-candidate');
    Route::get('/candidate/add', [AdminController::class, 'candi_add'])->name('candidate-add');
    Route::get('/votes', [AdminController::class, 'votes'])->name('admin-votes');
    Route::get('/users', [AdminController::class, 'users'])->name('admin-users');
    Route::get('/report', [AdminController::class, 'report'])->name('admin-report');
    Route::get('/print', [AdminController::class, 'print'])->name('admin-print');
    Route::get('/print-winner', [AdminController::class, 'printwinner'])->name('admin-printwinner');
    Route::get('/candidacyform', [AdminController::class, 'cf'])->name('admin-cf');
});


//STUDENT
Route::middleware('student')->prefix('student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student-dashboard');
    Route::get('/tabulation', [StudentController::class, 'tabulation'])->name('student-tabulation');
});

Route::get('/redirect', fn () => view('login'))->middleware(['checkRole', 'auth']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
