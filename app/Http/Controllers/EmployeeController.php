<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    public function showform(Request $request)
    {
        $departments = Department::all();
        $title = "Add Employees";
        return view('employeesform', compact('departments','title'));
    }

    //create
    public function employeeCreate(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:employees,email',
            'mobile' => 'required',
            'department' => 'required',
            'status' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $mobile = $request->mobile;
        $department = $request->department;
        $status = $request->status;
 
        if ($validator->fails()) {
            return redirect('employee')
                        ->withErrors($validator)
                        ->withInput();
        }

        $employee = Employee::Create([
            "name" => $name,
            "email" => $email,
            "mobile_no" => $mobile,
            "department_id" => $department,
            "status" => $status,
        ]);
 
        return redirect('back');
    }
}
