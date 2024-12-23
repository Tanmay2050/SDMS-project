<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Achievement Details</title>
    <link rel="stylesheet" href="/css/achieve.css">
</head>
<body>
    <!-- Navigation Bar -->
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
            <h1>Students Achievements</h1>
        <div class="horizontal-container">
            <form action="{{ route('dash.achieveadd') }}" method="get">
                <button class="add-btn" >Add New Entry</button>
            </form>
            <form action="{{ route('dash.achieve') }}" method="get">
                @csrf
                <input type="search" id="search" name="search" placeholder="Search by Name of Activity " style="width:400px; height:30px;" value="{{$search}}">
                <button class="add-btn" >Search</button>
                <a href="{{route('dash.achieve')}}">
                    <button class="reset-btn" type="button">Reset</button>
                </a>

            </form>
        </div>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Roll no</th>
                    <th>Department</th>
                    <th>Year of Study</th>
                    <th>Name of Activity</th>
                    <th>Award won</th>
                    <th>Certificate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{$entry->name}}</td>
                        <td>{{$entry->roll}}</td>
                        <td>{{$entry->dept}}</td>
                        <td>{{$entry->year}}</td>
                        <td>{{$entry->activity}}</td>
                        <td>{{$entry->award}}</td>
                        <td>
                            <img src = "{{asset($entry->certificate)}}" style = "width:70px ; height:70px;" alt="Img">
                        </td>
                        <td>
                        <div class="horizontal-column">
                                <form action="{{ route('dash.achieveedit', $entry->id) }}" method="get">
                                    <button class="edit-btn">Edit</button>
                                    
                                </form>
                                <form action="{{ route('dash.adestroy', $entry->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')                                
                                    <button class="delete-btn">Delete</button>
                                    
                                </form>
                                <form action="{{ route('dash.achieveview', $entry->id) }}" method="get">
                                    <button class="add-btn">View</button>  
                                </form>
                        </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
