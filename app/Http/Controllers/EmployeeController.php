<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Department;

class EmployeeController extends Controller
{
    //show
    public function showform(Request $request)
    {
        $departments = Department::all();
        $title = "Add Employees";
        $edit = false;
        return view('employeesform', compact('departments','title','edit'));
    }

    //edit
    public function editform(Request $request)
    {

        $departments = Department::all();
        $employee = Employee::where('employee_id', $request->employee_id)->first();
        $title = "Edit Employees";
        $edit = true;
        return view('employeesform', compact('departments','title','edit','employee'));
    }

    public function update(Request $request, $employee_id)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required,email',
                'mobile' => 'required',
                'department' => 'required',
                'status' => 'required',
            ]);
            $employee = Employee::where('employee_id', $request->employee_id)->first();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->mobile_no = $request->mobile;
            $employee->department_id = $request->department;
            $employee->status = $request->status;

            $employee->save();

            Employee::where('employee_id', $employee_id)->first();
            return redirect('/employee/list')->with('success', 'Employee Updated successfully.');

    }

    //list
    public function listAll(Request $request)
    {
        $employees = Employee::all();
        $title = "All Employees";
        return view('lists', compact('employees', 'title'));
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
 
        return back()->with('success', 'Employee created successfully.');
    }
}
