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
            <h3>View Items</h3>

    </div>
    
    <table>
    <h2>View Items</h2>
        <tr>
            <th>Notification ID</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>District</th>
            <th>Bid Starting</th>
            <th>Bid Closing</th>
            <th>View Bidding</th>
        </tr>
        <?php
     
    
     $db_user = "root";
     $db_password = "";
     $db_name = "additem";

     $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     $sql = "SELECT * FROM items";
     $result = $conn->query($sql);

     if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
             echo "<tr>";
             echo "<td>" . $row['notification_id'] . "</td>";
             echo "<td>" . $row['item_id'] . "</td>";
             echo "<td>" . $row['itemname'] . "</td>";
             echo "<td>" . $row['description'] . "</td>";
             echo "<td>" . $row['quantity'] . "</td>";
             echo "<td>" . $row['district'] . "</td>";
             echo "<td>" . $row['biddingstart'] . "</td>";
             echo "<td>" . $row['biddingclose'] . "</td>";
            echo "<td><a class='view-link' href='viewbid.php?notification_id="."'>View</a></td>";
          
             echo "</tr>";
         }
     } else {
         echo "0 results";
     }
     ?>
    </table>


    <div class="side">
        <ul>
            <li ><a href="employee_page.php">Issuer Home</a></li>
            <li class="select"><a href="additem.php">Add Items</a></li>
            <li><a href="viewitems.php">View Items</a></li>
            <li><a href="viewbid.php">View Bidding</a></li>
            <li><a href="approved.php">Approved Bidding</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul>
    </div>
    
</body>
</html>



