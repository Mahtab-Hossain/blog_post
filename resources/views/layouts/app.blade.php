<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogy</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for navbar */
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 15px 0;
        }
        footer a {
            color: #f8f9fa;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog-posts') }}">Blog Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register-user') }}">User Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tasks') }}">Tasks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <div class="container">
            <p>&copy; {{ date('Y') }} Blogy. All Rights Reserved.</p>
            <p>Made by Md. Mahtab Hossain Bhuiyan</p>
            <a href="https://github.com/Mahtab-Hossain" target="_blank">GitHub</a>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

