@extends('layouts.app')

@section('content')
<div class="form-container">
    <h2>Add Task</h2>
    <form>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection