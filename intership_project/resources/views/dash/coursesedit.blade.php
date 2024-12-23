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
        <h2>Edit Courses & Workshop Data</h2>
        <form action="{{route('dash.coursesupdate', ['newentries' => $newentries ])}}" method="post" enctype = "multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" value="{{old('name' , $newentries->name)}}" required>

            <label for="roll">Roll number</label>
            <input type="text" id="roll" name="roll" placeholder="Enter Roll no" value="{{old('roll' , $newentries->roll)}}" required>

            <label for="dept">Department</label>
            <select id="dept" name="dept" required>
                <option value="">--Select--</option>
                <option value="IT" {{ $newentries->dept == 'IT' ? 'selected' : '' }} >IT</option>
                <option value="EXTC" {{ $newentries->dept == 'EXTC' ? 'selected' : '' }}>EXTC</option>
                <option value="COMP" {{ $newentries->dept == 'COMP' ? 'selected' : '' }}>Computer</option>
                <option value="Mechanical" {{ $newentries->dept == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                <option value="Chemical" {{ $newentries->dept == 'Chemical' ? 'selected' : '' }}>Chemical</option>
                <option value="Electrical" {{ $newentries->dept == 'Electrical' ? 'selected' : '' }}>Electrical</option>

            </select>

            <label for="indexing">Year of Study</label>
            <select id="indexing" name="year" required>
                <option value="">--Select--</option>
                <option value="FE" {{$newentries->year == 'FE' ? 'selected' : ''}}>FE</option>
                <option value="SE" {{$newentries->year == 'SE' ? 'selected' : ''}}>SE</option>
                <option value="TE" {{$newentries->year == 'TE' ? 'selected' : ''}}>TE</option>
                <option value="BE" {{$newentries->year == 'BE' ? 'selected' : ''}}>BE</option>

            </select>

            <label for="type">Type of C/W/S</label>
            <select id="type" name="type" required>
                <option value="">--Select--</option>
                <option value="Courses" {{$newentries->type == 'Courses' ? 'selected' : ''}}>Course</option>
                <option value="Workshop" {{$newentries->type == 'Workshop' ? 'selected' : ''}}>Workshop</option>
                <option value="Seminar"{{$newentries->type == 'Seminar' ? 'selected' : ''}}>Seminar</option>
                
            </select>

            <label for="na">Title of C/W/S</label>
            <input type="text" id="na" name="title" placeholder="title" value = "{{old('title', $newentries->title)}}" required>

            <label for="aw">Name of Organization</label>
            <input type="text" id="aw" name="organization" placeholder="Organization/Institute" value = "{{old('organization', $newentries->organization)}}" required>
            

            <label for="aw">Stating Date </label>
            <input type="Date" id="aw" name="start" placeholder="From" value = "{{old('start', $newentries->start)}}" required>
            <label for="aw">Ending Date </label>
            <input type="Date" id="aw" name="end" placeholder="To" value = "{{old('end', $newentries->end)}}" required>

            <label for="certificate">Certificate</label>
            <input type="file" id="certificate" name="certificate" >

            <div class="form-buttons">
                <button type="submit" class="save-btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
