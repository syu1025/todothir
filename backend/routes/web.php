<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;

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

Route::get('/', [HelloController::class, 'index'])->name("input.index");
Route::get('/memo', [HelloController::class, 'memo'])->name("input.memo");
Route::post("/todolists", [HelloController::class, "store"])->name("input.store");
Route::delete("/todolists/deletechecked", [HelloController::class, "deleteChecked"])->name("input.deleteChecked");
