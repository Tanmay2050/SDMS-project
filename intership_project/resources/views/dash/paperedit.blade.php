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
        <h2>Edit Paper Publication Data</h2>
        <form action="{{route('dash.paperupdate', ['newentries' => $newentries])}}" method="post" enctype = "multipart/form-data">
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
            
            <label for="aw">Tile of Paper</label>
            <input type="text" id="aw" name="title" placeholder="Title" value="{{old('title' , $newentries->title)}}" required>

            <label for="pyear">Year of Publication</label>
            <select id="pyear" name="year_p" required>
                <option value="">--Select--</option>
                <option value="2015" {{$newentries->year_p == '2015' ? 'selected' : ''}} >2015</option>
                <option value="2016" {{$newentries->year_p == '2016' ? 'selected' : ''}} >2016</option>
                <option value="2017" {{$newentries->year_p== '2017' ? 'selected' : ''}} >2017</option>
                <option value="2018" {{$newentries->year_p== '2018' ? 'selected' : ''}} >2018</option>
                <option value="2019" {{$newentries->year_p== '2019' ? 'selected' : ''}} >2019</option>
                <option value="2020" {{$newentries->year_p== '2020' ? 'selected' : ''}} >2020</option>
                <option value="2021" {{$newentries->year_p == '2021' ? 'selected' : ''}} >2021</option>
                <option value="2022" {{$newentries->year_p== '2022' ? 'selected' : ''}} >2022</option>
                <option value="2023" {{$newentries->year_p== '2023' ? 'selected' : ''}} >2023</option>
                <option value="2024" {{$newentries->year_p== '2024' ? 'selected' : ''}} >2024</option>

            </select>

            <label for="aw">Name of Publisher</label>
            <input type="text" id="aw" name="publisher" placeholder="Publisher" value="{{old('publisher' , $newentries->publisher)}}" required>

            <label for="certificate">Published Paper</label>
            <input type="file" id="paper" name="paper">

            <div class="form-buttons">
                <button type="submit" class="save-btn">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
