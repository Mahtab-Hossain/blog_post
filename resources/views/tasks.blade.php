@extends('layouts.app')

@section('content')
<h2 class="mb-4">Task Management</h2>

<!-- Add Task Form -->
<div class="card mb-4">
    <div class="card-header">Add a New Task</div>
    <div class="card-body">
        <form id="taskForm">
            <div class="mb-3">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title">
            </div>
            <button type="submit" class="btn btn-primary w-100">Add Task</button>
        </form>
    </div>
</div>

<!-- Pending Tasks Section -->
<h3>Pending Tasks</h3>
<div id="pendingTasks" class="row g-3">
    <!-- Dynamic content for pending tasks will go here -->
</div>

<!-- Completed Tasks Section -->
<h3 class="mt-5">Completed Tasks</h3>
<div id="completedTasks" class="row g-3">
    <!-- Dynamic content for completed tasks will go here -->
</div>

<script>
    const taskForm = document.getElementById('taskForm');
    const pendingTasks = document.getElementById('pendingTasks');
    const completedTasks = document.getElementById('completedTasks');

    // Handle form submission
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

    // Load tasks into the UI
    async function loadTasks() {
        const response = await fetch('/api/tasks');
        const tasks = await response.json();

        pendingTasks.innerHTML = '';
        completedTasks.innerHTML = '';

        tasks.forEach(task => {
            const taskCard = `
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">${task.title}</h5>
                            <p class="card-text">
                                Status: <span class="badge ${task.is_completed ? 'bg-success' : 'bg-warning'}">
                                    ${task.is_completed ? 'Completed' : 'Pending'}
                                </span>
                            </p>
                            <p class="text-muted">Created: ${new Date(task.created_at).toLocaleString()}</p>
                            ${
                                !task.is_completed
                                    ? `<button class="btn btn-success btn-sm w-100" onclick="markAsCompleted(${task.id})">Mark as Completed</button>`
                                    : ''
                            }
                        </div>
                    </div>
                </div>
            `;

            if (task.is_completed) {
                completedTasks.innerHTML += taskCard;
            } else {
                pendingTasks.innerHTML += taskCard;
            }
        });
    }

    // Mark a task as completed
    async function markAsCompleted(id) {
        const response = await fetch(`/api/tasks/${id}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ is_completed: true }),
        });

        if (response.ok) {
            alert('Task marked as completed!');
            loadTasks();
        } else {
            alert('Error marking task as completed.');
        }
    }

    // Initial load of tasks
    loadTasks();
</script>
@endsection
