<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
        <h3>Tender Issuer Login</h3>

    </div>
    <div class="content">
       <center>
        <form method="POST">
            <h1>Issuer Login</h1>
            <br>
            <h3>Email : <br><input type= "email" name="email" id="email" required></h3>
            <br>
            <h3>Password : <input type="password" name="pwd" id="pwd" required></h3>
            <br><br>
            <center>
                <button>Sign in</button>
            </center>
        </form>
       </center>
    </div>
    <div class="side">
        <ul>
          <li ><a href="top.php">Home</a></li>
          <li class="select"><a href="employee.php">Issuer</a></li>
          <li class="back"><a href="test.html">Back</a></li>
        </ul>
    </div>
</body>
</html>




<?php
session_start(); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "addemp";

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    $sql = "SELECT * FROM employee_details WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    
    if ($result->num_rows == 1) {
        
        $_SESSION['admin_logged_in'] = true;
        header("Location: employee_page.php");
        exit();
    } else {
        
        echo "Invalid email or password. Please try again.";
    }


    $conn->close();
}
?>

