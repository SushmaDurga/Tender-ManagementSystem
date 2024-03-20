<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Details</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
        <h3>Issuer Details</h3>
    </div>
    
    <table>
    <h2>Issuer Details</h2>
        <tr>
            <th>IssuerID</th>
            <th>IssuerName</th>
            <th>IssuerEmail</th>
            <th>Dept</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Age</th>
            <th>Address</th>
            <th>Phno</th>
            <!-- <th>Status</th> -->
        </tr>
        <?php
     
    
     $db_user = "root";
     $db_password = "";
     $db_name = "addemp";

     $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM employee_details";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo "<tr>";
             echo "<td>" . $row['empid'] . "</td>";
             echo "<td>" . $row['empname'] . "</td>";
             echo "<td>" . $row['email'] . "</td>";
             echo "<td>" . $row['dept'] . "</td>";
             echo "<td>" . $row['gender'] . "</td>";
             echo "<td>" . $row['dob'] . "</td>";
             echo "<td>" . $row['age'] . "</td>";
             echo "<td>" . $row['address'] . "</td>";
             echo "<td>" . $row['phno'] . "</td>";
          
             echo "</tr>";
         }
     } else {
         echo "0 results";
     }
     ?>
    </table>


    <div class="side">
        <ul>
            <li ><a href="admin.php">Admin Home</a></li>
            <li><a href="addemployee.php">Add Issuer</a></li>
            <li class="select"><a href="viewemployee.php">View Issuer Details</a></li>
            <li><a href="viewsuppliers.php">View Bidder Details</a></li>
            <li><a href="supplierstender.php">Tenders</a></li>
            <li><a href="granted.php">Granted Tender</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul>
    </div>
</body>
</html>






