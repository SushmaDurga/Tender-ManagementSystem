<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Suppliers Details</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
         <h3>Bidder Details</h3>
    </div>
    
    <table>
    <h2>Bidders Details</h2>
        <tr>
            <th>BidderID</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Dob</th>
            <th>Address</th>
            <th>Phno</th>
            <th>Status</th>
            <th>Actions</th> 
        </tr>
        <?php
        $db_user = "root";
        $db_password = "";
        $db_name = "addsupplier";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_GET['id'])) {
            $supplier_id = $_GET['id'];
            $sql_update_status = "UPDATE supplier_details SET status = 'Approved' WHERE id = $supplier_id";
            if ($conn->query($sql_update_status) === TRUE) {
                echo "<script>alert('Supplier Approved successfully');</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $sql = "SELECT * FROM supplier_details";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['companyname'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['phno'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                
                echo "<td>";
                if ($row['status'] == "Waiting") {
                    echo "<a href='?id=" . $row['id'] . "'>Approve</a>";
                } else {
                    echo "No action";
                }
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>0 results</td></tr>";
        }
        ?>

    </table>

    <div class="side">
        <ul>
            <li ><a href="admin.php">Admin Home</a></li>
            <li><a href="addemployee.php">Add Issuer</a></li>
            <li><a href="viewemployee.php">View Issuer Details</a></li>
            <li class="select"><a href="viewsuppliers.php">View Bidder Details</a></li>
            <li ><a href="suppliertender.php">Tenders</a></li>
            <li><a href="granted.php">Granted Tender</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul>
    </div>
    
</body>
</html>