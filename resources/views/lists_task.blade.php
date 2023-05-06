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
            <th>Task Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    @foreach ($tasks as $task)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td><a href="/edit-task?task_id={{ $task->task_id }}" rel="noopener noreferrer">Edit</a></td>
    </tr>
    @endforeach
</table>
</div>
@endsection