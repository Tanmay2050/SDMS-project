<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Teacher Registration</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <h1 class="logo">Student Data Management System</h1>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
            </ul>
        </div>
    </nav>

    <!-- Registration Form -->
    <div class="form-container" id="register">
    <h2 class="register-title">Register</h2>
    <form action="{{route('student.registersave')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your username" required>
            <small class="error" id="usernameError"></small>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <small class="error" id="emailError"></small>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrapper">
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <small class="error" id="passwordError"></small>
        </div>

        <button type="submit">Register</button>
    </form>
    <h5>Already have an account?<a href = "{{ route('student.login') }}"> Login</a></h5>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <script src="script.js"></script>
</body>
</html>