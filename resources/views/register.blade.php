@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 500px;">
    <div class="card-header">Register a User</div>
    <div class="card-body">
        <form id="registerForm">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required minlength="3" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="8" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
        <div id="errorMessage" class="alert alert-danger mt-3" style="display: none;"></div>
    </div>
</div>

<script>
    const registerForm = document.getElementById('registerForm');
    const errorMessage = document.getElementById('errorMessage');

    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(registerForm);

        try {
            const response = await fetch('/api/register', {
                method: 'POST',
                headers: { 
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const data = await response.json();

            if (response.ok) {
                alert('Registration successful!');
                window.location.href = '/login';
            } else {
                errorMessage.textContent = data.message || 'Registration failed. Please try again.';
                errorMessage.style.display = 'block';
            }
        } catch (error) {
            errorMessage.textContent = 'An error occurred. Please try again.';
            errorMessage.style.display = 'block';
        }
    });
</script>
@endsection