<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProfileController;
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

Route::get('/main', function () {
    $todos = auth()->check() ? auth()->user()->todos : null; //調べる
    $latestInput = auth()->check() ? auth()->user()->latestInput : null;
    return view('todo1', compact('todos', 'latestInput'));
})->name("input.index");
Route::get('/memo', [HelloController::class, 'memo'])->name("input.memo");
Route::post("/todolists", [HelloController::class, "store"])->name("input.store");
Route::delete("/todolists/deletechecked", [HelloController::class, "deleteChecked"])->name("input.deleteChecked");

Route::get('/', [HelloController::class, "index"])->name("input.login");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
