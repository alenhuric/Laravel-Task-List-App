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

Route::group(array('namespace' => 'Task','middleware' => ['auth']), function () {
	Route::get('/', ['uses' => 'Dashboard@index'])->name('dashboard');
	Route::get('task/create', ['uses' => 'Task@create'])->name('task.create');
	Route::post('task/create', ['uses' => 'Task@store'])->name('task.store');
	Route::delete('task/delete/{task_id}', ['uses' => 'Task@delete'])->name('task.delete');
	Route::get('task/edit/{task_id}', ['uses' => 'Task@edit'])->name('task.edit');
	Route::post('task/edit/{task_id}', ['uses' => 'Task@update'])->name('task.update');
});



require __DIR__.'/auth.php';
