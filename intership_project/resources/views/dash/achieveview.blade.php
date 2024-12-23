<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Achievement Add Details</title>
    <link rel="stylesheet" href="/css/achieve.css">
</head>
<body>
<nav>
        <div class="nav-container">
            <div class="logo">Student Data Management System</div>
            <ul class="nav-links">
                <li><a href="{{route('student.dashboard')}}">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="{{route('student.logout')}}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Container for Table -->
    <div class="container">
            <h1>Students Achievements Details</h1>
        <table id="dataTable">
            
            <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{$newentries->name}}</td>
                    </tr>
                    <tr>
                        <td>Roll no.</td>
                        <td>{{$newentries->roll}}</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>{{$newentries->dept}}</td>
                    </tr>
                    <tr>
                        <td>Year of Study</td>
                        <td>{{$newentries->year}}</td>
                    </tr>
                    <tr>
                        <td>Name of Activity</td>
                        <td>{{$newentries->activity}}</td>
                    </tr>
                    <tr>
                        <td>Award won</td>
                        <td>{{$newentries->award}}</td>
                    </tr>
                    <tr>
                        <td>Certificate</td>
                        <td>
                        <img src = "{{asset($newentries->certificate)}}" style = "width:500px ; height:500px;" alt="Img">
                        </td>
                    </tr>
            </tbody>
        </table>
        <form action="{{route('dash.achieve')}}" method="get">
            <div class="form-buttons">
                    <button type="submit" class="back-btn">Back</button>
            </div>
        </form>
    </div>
</body>
</html>
