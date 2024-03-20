<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
        <h3>Bidder Signup</h3>

    </div>
    <div class="regform">
       <center>
        <form method="POST">
            <h3>Registration Form</h3>
            <br>
            Username : <input type="text" name="name" id="name">
            <br><br>
            Company Name : <input type="text" name="company" id="company">
            <br><br>
            Email : <input type= "email" name="email" id="email">
            <br><br>
            password : <input type="password" name="pwd" id="pwd">
            <br><br>
            Gender : <select name="gender" id="gender">
                <option disabled selected>gender</option>
                <option >Male</option>
                <option >Female</option>
            </select>
            <br><br>
            DOB : <input type="date" name="dob" id="dob">
            <br><br>
            Address : <input type="text" name="address" id="address">
            <br><br>
            phone : <input type="number" name="phno" id="phno">
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        </form>
       </center>
    </div>
    <div class="side">
        <ul>
          <li ><a href="top.php">Home</a></li>
          <li class="select"><a href="supplier.php">Bidder</a></li>
          <li class="back"><a href="test.html">Back</a></li>
        </ul>
    </div>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['name'], $_POST['company'], $_POST['email'], $_POST['pwd'], $_POST['gender'], $_POST['dob'], $_POST['address'], $_POST['phno'])) {
     
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "addsupplier";

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $name = $_POST['name'];
        $company = $_POST['company'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];

        $sql = "INSERT INTO supplier_details (username, companyname, email, password, gender, dob, address, phno) 
                VALUES ('$name', '$company', '$email', '$pwd', '$gender', '$dob', '$address', '$phno')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Please fill out all required fields.";
    }
}
?>
