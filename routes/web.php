<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
Route::post('/employee/update/{employee_id}', [EmployeeController::class, 'update'])->name('employee.update');


Route::get('/add-task', function () {
    return view('taskform')->with('title',"Add Task");
});
Route::post('/employee/store', [EmployeeController::class, 'employeeCreate'])->name('employee.create');

