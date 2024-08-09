<?php

use App\Http\Controllers\Admin\StopController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });



// x avere la pagina di apertura con il login
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');


Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('adimn.')
    ->group(function () {
        Route::get('/', [TravelController::class, 'index'])->name('home');
        Route::resource('travel', TravelController::class);
        Route::resource('stops', StopController::class);
        // Route::get('stop-travel', [StopController::class, 'stopTravel'])->name('stop_travel');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
