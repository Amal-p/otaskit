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

$action = "/task/update/$task->task_id";
}
else{

$action = "/task/store";
}
?>
<div class="form-container">
    <h2>{{ $title }}</h2>
    <form action="{{ $action }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" @if ($edit)value="{{ $task->title }}"@endif class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Description:</label>
            <textarea name="description" name="description" id="description" cols="56" rows="10">@if ($edit){{ $task->description }}@endif</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection