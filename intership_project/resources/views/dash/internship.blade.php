<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Internship Details</title>
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
        <h1>Students Internship</h1>
        <div class="horizontal-container">
        <form action="{{ route('dash.internshipadd') }}" method="get">
                @csrf
                <button class="add-btn" >Add New Entry</button>
            </form>            <form action="{{route('dash.internship')}}" method="get">
                <input type="search" name = "search" placeholder="Search by name of Organization "  style="width:400px; height:30px;" value="{{$search}}">
                <button class="add-btn" >Search</button>
                <a href="{{route('dash.internship')}}">
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
                    <th>Name of Organization</th>
                    <th>Internship Date (From)</th>
                    <th>Internship Date (To)</th>
                    <th>Intership Certificate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Row -->
                @foreach ($entries as $entry)
                    <tr>
               
                        <td>{{$entry->name}}</td>
                        <td>{{$entry->roll}}</td>
                        <td>{{$entry->dept}}</td>
                        <td>{{$entry->year}}</td>
                        <td>{{$entry->organization}}</td>
                        <td>{{$entry->start}}</td>
                        <td>{{$entry->end}}</td>
                        <td>
                            <img src = "{{asset($entry->certificate)}}" style = "width:70px ; height:70px;" alt="Img">
                        </td>
                        <td>
                        <div class="horizontal-column">
                            <form action="{{route('dash.internshipedit', $entry->id)}}" method="get">
                                <button class="edit-btn">Edit</button>
                                
                            </form>
                            <form action="{{ route('dash.idestroy', $entry->id) }}" method="post">
                                @csrf
                                @method('DELETE')                                
                                <button class="delete-btn">Delete</button>
                                
                            </form>
                            <form action="{{ route('dash.internshipview', $entry->id) }}" method="get">
                                    <button class="add-btn">View</button>  
                            </form>
                        </div>
                        </td>
                @endforeach

                </tr>
            </tbody>
        </table>
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
</body>
</html>
