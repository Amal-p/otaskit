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

    $action = "/employee/update/$employee->employee_id";
}
else{

    $action = "/employee/store";
}

?>
<div class="form-container">
    <h2>{{ $title }}</h2>
    <form action="{{ $action }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" @if ($edit)value="{{ $employee->name }}"@endif required>
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" @if ($edit)value="{{ $employee->email }}"@endif class="form-control" required>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="mobile">Mobile No.:</label>
            <input type="tel" id="mobile" name="mobile" @if ($edit)value="{{ $employee->mobile_no }}"@endif class="form-control" required>
            @if ($errors->has('mobile'))
                <span class="text-danger">{{ $errors->first('mobile') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <select id="department" name="department" class="form-control">
                @foreach ($departments as $item)
                    
                <option value="{{ $item->department_id }}" 
                    @if ($edit) 
                    @if ($item->department_id == $employee->department_id)
                        selected
                    @endif 
                    @endif >
                    {{ $item->label }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('department'))
                <span class="text-danger">{{ $errors->first('department') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <div class="form-check">
                <input type="radio" id="active" name="status" class="form-check-input" value="active" 
                @if ($edit) 
                @if ('active' == $employee->status)
                    checked
                @endif 
                @endif>
                <label for="active" class="form-check-label">Active</label>
            </div>
            <div class="form-check">
                <input type="radio" id="inactive" name="status" class="form-check-input" value="inactive"
                @if ($edit) 
                @if ('inactive' == $employee->status)
                    checked
                @endif 
                @endif>
                <label for="inactive" class="form-check-label">Inactive</label>
            </div>
            @if ($errors->has('status'))
                <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
