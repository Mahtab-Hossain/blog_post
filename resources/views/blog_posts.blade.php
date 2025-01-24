@extends('layouts.app')

@section('content')
<h2>Blog Post CRUD</h2>
<form id="createPostForm" class="mb-4">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter post content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>

<h3>All Blog Posts</h3>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody id="postsTable">
        <!-- Posts will be dynamically added here -->
    </tbody>
</table>

<script>
    const form = document.getElementById('createPostForm');
    const postsTable = document.getElementById('postsTable');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        const response = await fetch('/api/posts', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(Object.fromEntries(formData)),
        });

        if (response.ok) {
            alert('Post created successfully!');
            loadPosts();
        }
    });

    async function loadPosts() {
        const response = await fetch('/api/posts');
        const posts = await response.json();

        postsTable.innerHTML = posts.map(post => `
            <tr>
                <td>${post.id}</td>
                <td>${post.title}</td>
                <td>${post.content}</td>
                <td>${post.created_at}</td>
            </tr>
        `).join('');
    }

    loadPosts(); // Load posts on page load
</script>
@endsection
