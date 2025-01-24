@extends('layouts.app')

@section('content')
<div class="text-center p-5 bg-white rounded shadow mb-5">
    <h1 class="display-4">Welcome to My Laravel App</h1>
    <p class="lead">Manage your blog posts, users, and tasks efficiently, all in one place.</p>
    <div class="d-grid gap-2 d-md-flex justify-content-center">
        <a href="{{ url('/blog-posts') }}" class="btn btn-primary btn-lg me-2">Manage Blog Posts</a>
        <a href="{{ url('/register-user') }}" class="btn btn-success btn-lg me-2">Register a User</a>
        <a href="{{ url('/tasks') }}" class="btn btn-warning btn-lg">Manage Tasks</a>
    </div>
</div>

<!-- Recent Blog Posts -->
<div class="mb-5">
    <h3>Recent Blog Posts</h3>
    <div id="recentPosts" class="row g-3">
        <!-- Dynamic content for recent posts will go here -->
    </div>
</div>

<!-- Recent Tasks -->
<div class="mb-5">
    <h3>Recent Tasks</h3>
    <div id="recentTasks" class="row g-3">
        <!-- Dynamic content for recent tasks will go here -->
    </div>
</div>

<!-- Quick Statistics -->
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Quick Statistics</h5>
        <div class="row">
            <div class="col-md-4">
                <h1 id="totalPosts" class="text-primary">0</h1>
                <p>Blog Posts</p>
            </div>
            <div class="col-md-4">
                <h1 id="totalTasks" class="text-success">0</h1>
                <p>Tasks</p>
            </div>
            <div class="col-md-4">
                <h1 id="pendingTasks" class="text-warning">0</h1>
                <p>Pending Tasks</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Load recent blog posts
    async function loadRecentPosts() {
        const response = await fetch('/api/posts');
        const posts = await response.json();
        const recentPosts = posts.slice(0, 3); // Show only the 3 most recent posts

        const recentPostsContainer = document.getElementById('recentPosts');
        recentPostsContainer.innerHTML = recentPosts.map(post => `
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <p class="card-text">${post.content.substring(0, 100)}...</p>
                        <small class="text-muted">Created: ${new Date(post.created_at).toLocaleDateString()}</small>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load recent tasks
    async function loadRecentTasks() {
        const response = await fetch('/api/tasks');
        const tasks = await response.json();
        const recentTasks = tasks.slice(0, 3); // Show only the 3 most recent tasks

        const recentTasksContainer = document.getElementById('recentTasks');
        recentTasksContainer.innerHTML = recentTasks.map(task => `
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${task.title}</h5>
                        <p>Status: <span class="badge ${task.is_completed ? 'bg-success' : 'bg-warning'}">
                            ${task.is_completed ? 'Completed' : 'Pending'}
                        </span></p>
                        <small class="text-muted">Created: ${new Date(task.created_at).toLocaleDateString()}</small>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Load quick statistics
    async function loadStatistics() {
        const postsResponse = await fetch('/api/posts');
        const posts = await postsResponse.json();

        const tasksResponse = await fetch('/api/tasks');
        const tasks = await tasksResponse.json();

        document.getElementById('totalPosts').textContent = posts.length;
        document.getElementById('totalTasks').textContent = tasks.length;
        document.getElementById('pendingTasks').textContent = tasks.filter(task => !task.is_completed).length;
    }

    // Load everything on page load
    loadRecentPosts();
    loadRecentTasks();
    loadStatistics();
</script>
@endsection
