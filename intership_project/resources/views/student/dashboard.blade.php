<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Data Management System (SDMS)</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <!-- Navigation Panel -->
    <nav>
        <div class="nav-container">
            <div class="logo">Student Data Management System</div>
            <ul class="nav-links">
                <li><a href="#">Profile</a></li>
                <li><a href="{{route('student.logout')}}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <h1 class="dashboard-title">Welcome, {{Auth::user()->name}} </h1>
        <h5 class="you">You are logged in !</h5>
        <div class="cards-container">
            <div class="card student-card">
                <h2><a href = "{{route('dash.achieve')}}"> Student Achievements</a></h2>
            </div>
            <div class="card teacher-card">
                <h2><a href = "{{route('dash.internship')}}"> Student Internships</a></h2>
            </div>
            <div class="card staff-card">
                <h2><a href = "{{route('dash.courses')}}"> Student Courses & Workshop</a></h2>
                
            </div>
            <div class="card principal-card">
                <h2><a href = "{{route('dash.paper')}}"> Student Paper Publications</a></h2>
            </div>
        </div>
    </div>
    <footer class="footer"></footer>
</body>
</html>
