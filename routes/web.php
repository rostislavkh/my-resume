<?php

use App\Http\Controllers\ProjectsController;
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
    return view('pages.home.welcome');
})->name('main');

Route::get('/projects', [ProjectsController::class, 'allProjects'])->name('projects');
Route::get('/project', [ProjectsController::class, 'oneProjects'])->name('project');