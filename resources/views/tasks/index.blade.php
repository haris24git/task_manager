@extends('layouts.app')

@section('content')
<h1>My Tasks</h1>
<a href="/tasks/create" class="btn btn-success mb-3">Create New Task</a>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Due Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'N/A' }}</td>
                <td>
                    <a href="/tasks/{{ $task->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No tasks found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
