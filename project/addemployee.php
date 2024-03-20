<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee details</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
        <h3>Add Issuer</h3>
    </div>
    <div class="regform">
        <center>
            <h3>Add Issuer Details</h3>
        </center>
        <form method="POST">
            Issuer ID : <input type="text" name="empid" id="empid">
            <br><br>
            Issuer Name : <input type="text" name="empname" id="empname">
            <br><br>
            Issuer Email : <input type="email" name="email" id="email">
            <br><br>
            Department : <select name="dept" id="dept">
                <option disabled selected>select Department</option>
                <option >Agricultural Department</option>
                <option >Chemical Department</option>
                <option >Computer science Department</option>
                <option >Mechanical Department</option>
                <option >IT Department</option>
            </select>
            <br><br>
            Gender : <select name="gender" id="gender">
                <option disabled selected>gender</option>
                <option >Male</option>
                <option >Female</option>
            </select>
            <br><br>
            DOB : <input type="date" name="dob" id="dob">
            <br><br>
            Age : <input type="number" id="age" name="age">
            <br><br>
            Address : <input type="text" name="address" id="address">
            <br><br>
            Phone Number : <input type="number" name="phno" id="phno">
            <br><br>
            Password : <input type="password" name="pwd" id="pwd">
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        
        </form>
        

    </div>

    <div class="side">
        <ul>
            <li ><a href="admin.php">Admin Home</a></li>
            <li class="select"><a href="addemployee.php">Add Issuer</a></li>
            <li><a href="viewemployee.php">View Issuer Details</a></li>
            <li><a href="viewsuppliers.php">View Bidder Details</a></li>
            <li><a href="suppliertender.php">Tenders</a></li>
            <li><a href="granted.php">Granted Tender</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul>
    </div>
    
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['empid'], $_POST['empname'], $_POST['email'], $_POST['dept'], $_POST['gender'], $_POST['dob'], $_POST['age'], $_POST['address'], $_POST['phno'], $_POST['pwd'])) {
     
        $db_user = "root";
        $db_password = "";
        $db_name = "addemp";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $empid = $_POST['empid'];
        $empname = $_POST['empname'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];
        $gender = $_POST['gender'];
        $dateofbirth = $_POST['dob'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phno = $_POST['phno'];
        $password = $_POST['pwd'];

        $sql = "INSERT INTO employee_details (empid, empname, email, dept, gender, dob, age, address, phno, password) 
                VALUES ('$empid', '$empname', '$email', '$dept', '$gender', '$dateofbirth', '$age', '$address', '$phno', '$password')";

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

