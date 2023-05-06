@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Add Employees</h2>
    <form>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile No.:</label>
            <input type="tel" id="mobile" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <select id="department" class="form-control">
                <option value="sales">Sales</option>
                <option value="marketing">Marketing</option>
                <option value="it">IT</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <div class="form-check">
                <input type="radio" id="active" name="status" class="form-check-input" value="active" checked>
                <label for="active" class="form-check-label">Active</label>
            </div>
            <div class="form-check">
                <input type="radio" id="inactive" name="status" class="form-check-input" value="inactive">
                <label for="inactive" class="form-check-label">Inactive</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
