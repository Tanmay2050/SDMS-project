<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Achievement Add Details</title>
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
        <h2>Edit Achievement Data</h2>
        <form action="{{ route('dash.achieveupdate', ['newentries' => $newentries->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT for updates -->
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" value="{{ old('name', $newentries->name) }}" required>

            <label for="roll">Roll number</label>
            <input type="text" id="roll" name="roll" placeholder="Enter Roll no" value="{{ old('roll', $newentries->roll) }}" required>

            <label for="dept">Department</label>
            <select id="dept" name="dept" required>
                <option value="">--Select--</option>
                <option value="IT" {{ $newentries->dept == 'IT' ? 'selected' : '' }}>IT</option>   <!-- If the condition is true ($newentries->dept == 'IT') then it will preselect the 'IT' if false then ''(noting)-->
                <option value="EXTC" {{ $newentries->dept == 'EXTC' ? 'selected' : '' }}>EXTC</option>
                <option value="COMP" {{ $newentries->dept == 'COMP' ? 'selected' : '' }}>Computer</option>
                <option value="Mechanical" {{ $newentries->dept == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                <option value="Chemical" {{ $newentries->dept == 'Chemical' ? 'selected' : '' }}>Chemical</option>
                <option value="Electrical" {{ $newentries->dept == 'Electrical' ? 'selected' : '' }}>Electrical</option>
            </select>

            <label for="indexing">Year of Study</label>
            <select id="indexing" name="year" required>
                <option value="">--Select--</option>
                <option value="FE" {{ $newentries->year == 'FE' ? 'selected' : '' }}>FE</option>
                <option value="SE" {{ $newentries->year == 'SE' ? 'selected' : '' }}>SE</option>
                <option value="TE" {{ $newentries->year == 'TE' ? 'selected' : '' }}>TE</option>
                <option value="BE" {{ $newentries->year == 'BE' ? 'selected' : '' }}>BE</option>
            </select>

            <label for="na">Name of Activity</label>
            <input type="text" id="na" name="activity" placeholder="Activity" value="{{ old('activity', $newentries->activity) }}" required>

            <label for="aw">Award won</label>
            <input type="text" id="aw" name="award" placeholder="Name the Award" value="{{ old('award', $newentries->award) }}">

            <label for="certificate">Certificate</label>
            <input type="file" id="certificate" name="certificate">

            <div class="form-buttons">
                <button type="submit" class="save-btn">Update</button>
            </div>
        </form>

    </div>
</body>
</html>
