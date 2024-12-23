<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Courses Add Details</title>
    <link rel="stylesheet" href="/css/add.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="nav-container">
            <div class="logo">Student Data Management System</div>
            <ul class="nav-links">
                <li><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('student.logout')}}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Container for Table -->
    <div class="form-container">
        <h2>Add Courses & Workshop Data</h2>
        <form action="{{route('dash.dcoursesadd')}}" method="post" enctype = "multipart/form-data">
            @csrf
            <label for="name">Name <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" placeholder="Enter Name" required>

            <label for="roll">Roll number <span style="color: red;">*</span></label>
            <input type="text" id="roll" name="roll" placeholder="Enter Roll no" required>

            <label for="dept">Department <span style="color: red;">*</span></label>
            <select id="dept" name="dept" required>
                <option value="">--Select--</option>
                <option value="IT">IT</option>
                <option value="EXTC">EXTC</option>
                <option value="COMP">Computer</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Chemical">Chemical</option>
                <option value="Electrical">Electrical</option>

            </select>

            <label for="indexing">Year of Study <span style="color: red;">*</span></label>
            <select id="indexing" name="year" required>
                <option value="">--Select--</option>
                <option value="FE">FE</option>
                <option value="SE">SE</option>
                <option value="TE">TE</option>
                <option value="BE">BE</option>

            </select>

            <label for="type">Type of C/W/S <span style="color: red;">*</span></label>
            <select id="type" name="type" required>
                <option value="">--Select--</option>
                <option value="Courses">Course</option>
                <option value="Workshop">Workshop</option>
                <option value="Seminar">Seminar</option>
            </select>

            <label for="na">Title of C/W/S <span style="color: red;">*</span></label>
            <input type="text" id="na" name="title" placeholder="title" required>

            <label for="aw">Name of Organization <span style="color: red;">*</span></label>
            <input type="text" id="aw" name="organization" placeholder="Organization/Institute" required>

            <label for="aw">Stating Date <span style="color: red;">*</span></label>
            <input type="Date" id="aw" name="start" placeholder="From" required>
            <label for="aw">Ending Date <span style="color: red;">*</span> </label>
            <input type="Date" id="aw" name="end" placeholder="To" required>

            <label for="certificate">Certificate <span style="color: red;">*</span></label>
            <input type="file" id="certificate" name="certificate">

            <div class="form-buttons">
                <button type="submit" class="save-btn">Add Data</button>
            </div>
        </form>
    </div>
</body>
</html>
