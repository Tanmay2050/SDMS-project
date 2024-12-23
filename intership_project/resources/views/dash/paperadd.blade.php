<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Paper Publication Add Details</title>
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
        <h2>Add Student Paper Publication Data</h2>
        <form action="{{route('dash.dpaperadd')}}" method="post" enctype = "multipart/form-data">
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
            
            <label for="aw">Tile of Paper <span style="color: red;">*</span></label>
            <input type="text" id="aw" name="title" placeholder="Title" required>

            <label for="pyear">Year of Publication <span style="color: red;">*</span></label>
            <select id="pyear" name="year_p" required>
                <option value="">--Select--</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
>

            </select>

            <label for="aw">Name of Publisher <span style="color: red;">*</span></label>
            <input type="text" id="aw" name="publisher" placeholder="Publisher" required>

            <label for="certificate">Published Paper <span style="color: red;">*</span></label>
            <input type="file" id="paper" name="paper">

            <div class="form-buttons">
                <button type="submit" class="save-btn">Add Data</button>
            </div>
        </form>
    </div>
</body>
</html>
