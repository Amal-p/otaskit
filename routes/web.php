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

Route::get('/add-task', function () {
    return view('taskform')->with('title',"Add Task");
});
Route::post('/employee/store', [EmployeeController::class, 'employeeCreate'])->name('employee.create');

