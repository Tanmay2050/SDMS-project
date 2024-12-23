<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Paper Publication Details</title>
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
        <h1>Students Paper Publication</h1>
        <div class="horizontal-container">
        <form action="{{ route('dash.paperadd') }}" method="get">
                @csrf
                <button class="add-btn" >Add New Entry</button>
            </form>   
            <form action="{{route('dash.paper')}}" method="get">     
                <input type="search" name = "search" placeholder="Search by Title of Paper"  style="width:400px; height:30px;" value="{{$search}}">
                <button class="add-btn" >Search</button>
                <a href="{{route('dash.paper')}}">
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
                    <th>Title of Paper</th>
                    <th>Year of Publication </th>
                    <th>Name of Publisher</th>
                    <th>Published Paper</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Row -->
                @foreach ($entries as $entry )
                <tr>
                    <td>{{$entry->name}}</td>
                    <td>{{$entry -> roll}}</td>
                    <td>{{$entry -> dept}}</td>
                    <td>{{$entry -> year}}</td>
                    <td>{{$entry -> title}}</td>
                    <td>{{$entry -> year_p}}</td>
                    <td>{{$entry -> publisher}}</td>
                    <td>
                        <img src = "{{asset($entry -> paper)}}" alt="Img" style="width:70px; height:70px;">
                    </td>
                    <td>
                    <div class="horizontal-column">
                            <form action="{{ route('dash.paperedit', $entry->id) }}" method="get">
                                @csrf
                                <button class="edit-btn">Edit</button>
                                
                            </form>
                            <form action="{{ route('dash.pdestroy', $entry->id) }}" method="post">
                                @csrf
                                @method('DELETE')                                
                                <button class="delete-btn">Delete</button>
                                
                            </form>
                                <form action="{{ route('dash.paperview', $entry->id) }}" method="get">
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
