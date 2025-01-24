@extends('layouts.app')

@section('content')
<h2>Task Management</h2>
<form id="taskForm" class="mb-4">
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title">
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
</form>

<h3>Pending Tasks</h3>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Is Completed</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="tasksTable">
        <!-- Tasks will be dynamically added here -->
    </tbody>
</table>

<script>
    const taskForm = document.getElementById('taskForm');
    const tasksTable = document.getElementById('tasksTable');

    taskForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(taskForm);

        const response = await fetch('/api/tasks', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(Object.fromEntries(formData)),
        });

        if (response.ok) {
            alert('Task added successfully!');
            loadTasks();
        }
    });

    async function loadTasks() {
        const response = await fetch('/api/tasks');
        const tasks = await response.json();

        tasksTable.innerHTML = tasks.map(task => `
            <tr>
                <td>${task.id}</td>
                <td>${task.title}</td>
                <td>${task.is_completed}</td>
                <td>
                    <button class="btn btn-success btn-sm" onclick="markAsCompleted(${task.id})">Mark as Completed</button>
                </td>
            </tr>
        `).join('');
    }

    async function markAsCompleted(id) {
        const response = await fetch(`/api/tasks/${id}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ is_completed: true }),
        });

        if (response.ok) {
            alert('Task marked as completed!');
            loadTasks();
        }
    }

    loadTasks(); // Load tasks on page load
</script>
@endsection
