# Laravel Coding Round Project

This repository contains the implementation of the Laravel Coding Round tasks, including:

1. Blog Post CRUD API
2. User Registration API
3. Task Management API

---

## Features

### 1. Blog Post CRUD API
- **Create a Post**: Save a blog post with a title and content.
- **List All Posts**: Fetch all blog posts in JSON format.
- **View a Single Post**: Retrieve details of a specific blog post using its ID.

### 2. User Registration API
- **Register a User**: Accept user details (name, email, and password) with input validation.
- **Password Security**: Save the password securely in a hashed format.
- **Return User Data**: Exclude the password from the API response.

### 3. Task Management API
- **Add a Task**: Save a task with a title, defaulting `is_completed` to `false`.
- **Mark Task as Completed**: Update a task's completion status by its ID.
- **Get Pending Tasks**: Retrieve tasks that are not yet completed.

---

## Installation and Setup

Follow these steps to set up the project on your local system:

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Laravel Installer (optional)

### Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd laravel-coding-round
   run: php artisan migrate
   run: php artisan serve
