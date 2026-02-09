@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>
<form method="POST" action="/tasks/{{ $task->id }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $task->description }}</textarea>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Due Date</label>
        <input type="date" name="due_date" class="form-control" value="{{ $task->due_date ? $task->due_date->format('Y-m-d') : '' }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Task</button>
    <a href="/tasks" class="btn btn-secondary">Cancel</a>
</form>
@endsection
