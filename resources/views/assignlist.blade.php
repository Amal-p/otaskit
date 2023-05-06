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
<div class="container">
    <h2>{{ $title }}</h2>
    <table>
        <tr>
            <th>Sl No</th>
            <th>Task Name</th>
            <th>Employee name</th>
            <th>Action</th>
        </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $task->title }}</td>
        <td>@if (!empty($task->employee->name))
            {{ $task->employee->name }}
        @endif</td>
        <td><a href="/task/reassign?task_id={{ $task->task_id }}" rel="noopener noreferrer">Reassign</a></td>
    </tr>
    @endforeach
</table>
</div>
@endsection