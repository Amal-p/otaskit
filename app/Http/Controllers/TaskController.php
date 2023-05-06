<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

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
}
