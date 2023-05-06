<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\Models\Employee;

class TaskController extends Controller
{
    //show
    public function showTaskForm(Request $request)
    {
        $title = "Add Task";
        $edit = false;
        return view('taskform', compact('title','edit'));
    }
        //create
    public function taskCreate(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        $title = $request->title;
        $description = $request->description;
    
        if ($validator->fails()) {
            return redirect('add-task')
                        ->withErrors($validator)
                        ->withInput();
        }

        $employee = Task::Create([
            "title" => $title,
            "description" => $description,
        ]);
    
        return back()->with('success', 'Task created successfully.');
    }

        //edit
        public function edittaskform(Request $request)
        {
            $task = Task::where('task_id', $request->task_id)->first();
            $title = "Edit Task";
            $edit = true;
            return view('taskform', compact('title','edit','task'));
        }

         //list
        public function listAll(Request $request)
        {
            $tasks = Task::all();

            $title = "All Task";
            return view('lists_task', compact('tasks', 'title'));
        }

        //update
        public function update(Request $request, $task_id)
        {
                $validator = Validator::make($request->all(), [
                    'title' => 'required',
                    'description' => 'required',
                ]);
                $task = Task::where('task_id', $request->task_id)->first();
                $task->title = $request->title;
                $task->description = $request->description;
    
                $task->save();
    
                Task::where('task_id', $task_id)->first();
                return redirect('/task/list')->with('success', 'Task Updated successfully.');
    
        }

        //list
        public function assignList(Request $request)
        {
            $tasks = Task::where('status', 'assigned')->get();
            $title = "Assign List";
            return view('assignlist', compact('tasks', 'title'));
        }

        public function assignForm(Request $request){
            $employee = Employee::where('status', 'active')->get();
            $tasks = Task::where('status', 'unassigned')->get();
            $title = "Asigne Task";
            $edit = false;
            return view('asigneform', compact('tasks','employee','title','edit'));
        }

        public function editassignForm(Request $request){
            $task_id = $request->task_id;
            $employee = Employee::where('status', 'active')->get();
            $tasks = Task::where('task_id', $task_id)->get();
            $title = "Asigne Task";
            $edit = true;
            return view('asigneform', compact('tasks','employee','title','edit'));
        }

        public function assign(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'task_id' => 'required|exists:tasks,task_id',
                'employee_id' => 'required|exists:employees,employee_id',
            ]);
     
            if ($validator->fails()) {
                return redirect('r/task/assign')
                            ->withErrors($validator)
                            ->withInput();
            }

            $task = Task::where('task_id', $request->task_id)->first();

            if($task->status != 'unassigned') {
                return back()->with('error', 'Task already assigned');
            }

            $employee = Employee::where('employee_id', $request->employee_id)->first();

            $employee->task_id = $task->task_id;
            $employee->save();

            $task->status = 'assigned';
            $task->save();

            return back()->with('success', 'Task assigned successfully');
        }

        public function reAssign(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'task_id' => 'required|exists:tasks,task_id',
                'employee_id' => 'required|exists:employees,employee_id',
            ]);
     
            if ($validator->fails()) {
                return redirect('/task/assign')
                            ->withErrors($validator)
                            ->withInput();
            }

            $task = Task::where('task_id', $request->task_id)->first();

            if($task->status != 'assigned') {
                return back()->with('error', 'Task is not is assigned status');
            }

            $new_assignee = Employee::where('employee_id', $request->employee_id)->first();

            // $old_assignee = $task->employee;
            // $old_assignee->task_id = null;
            // $old_assignee->save();
            $new_assignee->task_id = $task->task_id;
            $new_assignee->save();

            return back()->with('success', 'Task reassigned successfully');
        }
}
