@extends('layouts.app')

@section('content')
@if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
@endif
<?php
if ($edit){

$action = "/task/reassign/";
}
else{

$action = "/task/assign";
}
?>
<div class="form-container">
    <h2>{{ $title }}</h2>
    <form action="{{ $action }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="task">Task:</label>
            <select id="task" name="task_id" class="form-control">
                @foreach ($tasks as $item)
                    
                <option value="{{ $item->task_id }}" 
                    @if ($edit)
                    @if (!empty($employee->task_id))
                    @if ($item->task_id == $employee->task_id)
                        selected
                    @endif 
                        
                    @endif
                    @endif >
                    {{ $item->title }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('task_id'))
                <span class="text-danger">{{ $errors->first('task_id') }}</span>
            @endif

            <label for="task">Employee:</label>
            <select id="task" name="employee_id" class="form-control">
                @foreach ($employee as $item)
                    
                <option value="{{ $item->employee_id }}" 
                    @if ($edit)
                    @if (!empty($item->employee_id) && !empty($employee->employee_id)) 
                    @if ($item->employee_id == $employee->employee_id)
                        selected
                    @endif 
                    @endif 
                    @endif >
                    {{ $item->name }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('employee_id'))
                <span class="text-danger">{{ $errors->first('employee_id') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection