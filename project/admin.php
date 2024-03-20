<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
        <h3>Admin Login</h3>
    </div>
    <div class="content">
       <center>
        <form method="POST">
            <h1>Administration Login</h1>
<br>
            <h3>Email : </h3> <input type= "email" name="email" id="email" required>

            <h3>Password : </h3><input type="password" name="pwd" id="pwd" required>
            <center>
                <button>Sign in</button>
            </center>
        </form>
       </center>
    </div>
    

    <div class="side">
        <ul>
          <li ><a href="top.php">Home</a></li>
          <li class="select"><a href="admin.php">Admin</a></li>
          <li class="back"><a href="test.html">Back</a></li>
        </ul>
    </div>
</body>
</html>




<?php

session_start();


$default_email = "admin@gmail.com";
$default_password = "admin123";


$email = $_POST['email'];
$password = $_POST['pwd'];

if ($email === $default_email && $password === $default_password) {
    
    $_SESSION['admin_logged_in'] = true; 
    header("Location: admin_dashboard.php");
} else {
    echo "Invalid email or password. Please try again.";
}
?>
