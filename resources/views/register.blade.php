@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header">Register a User</div>
    <div class="card-body">
        <form id="registerForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
    </div>
</div>

<script>
    const registerForm = document.getElementById('registerForm');

    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(registerForm);

        const response = await fetch('/api/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(Object.fromEntries(formData)),
        });

        if (response.ok) {
            alert('User registered successfully!');
        } else {
            alert('Error: Unable to register user.');
        }
    });
</script>
@endsection
