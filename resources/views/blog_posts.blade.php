@extends('layouts.app')

@section('content')
<h2 class="mb-4">Blog Post Management</h2>

<!-- Create Post Form -->
<div class="card mb-4">
    <div class="card-header">Create a New Blog Post</div>
    <div class="card-body">
        <form id="createPostForm">
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
    </div>
</div>

<!-- List of Blog Posts -->
<h3>All Blog Posts</h3>
<div id="postsList" class="row">
    <!-- Dynamic content goes here -->
</div>

<script>
    const form = document.getElementById('createPostForm');
    const postsList = document.getElementById('postsList');

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

        postsList.innerHTML = posts.map(post => `
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <p class="card-text">${post.content}</p>
                        <small class="text-muted">Created at: ${new Date(post.created_at).toLocaleString()}</small>
                    </div>
                </div>
            </div>
        `).join('');
    }

    loadPosts(); // Load posts on page load
</script>
@endsection
