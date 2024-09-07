<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\TODOLISTController::class,'index'])->name('index');

Route::POST('/Show_Task', [App\Http\Controllers\TODOLISTController::class,'Show_Task'])->name('Show_Task');
Route::POST('/AddTaskComplete', [App\Http\Controllers\TODOLISTController::class,'AddTaskComplete'])->name('AddTaskComplete');

Route::POST('/Destroy', [App\Http\Controllers\TODOLISTController::class,'Destroy'])->name('Destroy');
Route::POST('/AllList', [App\Http\Controllers\TODOLISTController::class,'AllList'])->name('AllList');
Route::POST('/CheckList', [App\Http\Controllers\TODOLISTController::class,'CheckList'])->name('CheckList');

Route::POST('/Add_task', [App\Http\Controllers\TODOLISTController::class,'Show_Task'])->name('Show_Task');
Route::POST('/store', [App\Http\Controllers\TODOLISTController::class,'store'])->name('store');

