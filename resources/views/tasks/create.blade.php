@extends('layouts.app')

@section('content')
<h1>Create Task</h1>
<form method="POST" action="/tasks">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection
