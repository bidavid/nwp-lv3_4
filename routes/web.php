<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UsersController;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
});

//Route for fetching user owned projects, assigned to projects and returning dashboard view
Route::get('/dashboard', [ProjectsController::class, 'fetchProjectsForUser'])->middleware(['auth'])->name('dashboard');

// Route for creating the project, after success user is redirected to dashboard
Route::post('/create', [ProjectsController::class, 'createProject'])->middleware('auth');

// Route for returing the create project view
Route::get('/create', function () {
    return view('create_project');
})->middleware('auth')->name('create');

//Route for fetching all other users except for the logged one and returning assignation view
Route::post('/assign-member', [ProjectsController::class, 'fetchOtherUsers'])->middleware('auth');

//Route for updating pivot table after we assign user to project
Route::post('/perform-assign', [ProjectsController::class, 'performAssign'])->middleware('auth');

require __DIR__.'/auth.php';