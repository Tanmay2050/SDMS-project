<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Registration</h1>
    <div>
    <form method="post" action="">
        @csrf
        <div>
        <label>Name </label>
        <input type = "text" name="name" placeholder="Name">
        </div>
        <div>
        <label>Email </label>
        <input type = "email" name="email" placeholder="Email">
        </div>
        <div>
        <label>Password </label>
        <input type = "password" name="password" placeholder="Password">
        </div>
        <div>
            <input type = "submit" value = "Register">
        </div>
    </form>
</div>
</body>
</html>