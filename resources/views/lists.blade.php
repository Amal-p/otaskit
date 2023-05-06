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
            <th>Employee Name</th>
            <th>Employee Email</th>
            <th>Employee Mobile</th>
            <th>Employee Department</th>
            <th>Employee Status</th>
            <th>Action</th>
        </tr>
    @foreach ($employees as $employee)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->mobile_no }}</td>
        <td>{{ $employee->department->label }}</td>
        <td>{{ $employee->status }}</td>
        <td><a href="/edit-employees?employee_id={{ $employee->employee_id }}" rel="noopener noreferrer">Edit</a></td>
    </tr>
    @endforeach
</table>
</div>
@endsection