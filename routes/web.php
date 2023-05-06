<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/add-employees', function () {
//     return view('employeesform')->with('title',"Add Employees");
// });
Route::get('/add-employees', [EmployeeController::class, 'showform'])->name('employee.show');
Route::get('/edit-employees', [EmployeeController::class, 'editform'])->name('employee.edit');
Route::get('/employee/list', [EmployeeController::class, 'listAll'])->name('employee.listall');
Route::post('/employee/store', [EmployeeController::class, 'employeeCreate'])->name('employee.create');
Route::post('/employee/update/{employee_id}', [EmployeeController::class, 'update'])->name('employee.update');


// Route::get('/add-task', function () {
//     return view('taskform')->with('title',"Add Task");
// });
Route::get('/add-task', [TaskController::class, 'showTaskForm'])->name('task.show');
Route::get('/task/assign', [TaskController::class, 'assignForm'])->name('task.assignform');
Route::get('/task/reassign', [TaskController::class, 'editassignForm'])->name('task.assignform');
Route::post('/task/reassign', [TaskController::class, 'reAssign'])->name('task.reassignform');
Route::get('/task/assign/list', [TaskController::class, 'assignList'])->name('task.assignform');
Route::post('/task/assign', [TaskController::class, 'assign'])->name('task.assign');
Route::post('/task/store', [TaskController::class, 'taskCreate'])->name('task.create');
Route::get('/edit-task', [TaskController::class, 'edittaskform'])->name('task.edit');
Route::get('/task/list', [TaskController::class, 'listAll'])->name('task.listall');
Route::post('/task/update/{task_id}', [TaskController::class, 'update'])->name('task.update');

