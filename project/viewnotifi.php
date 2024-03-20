<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tender Notifications</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
            <h3>Notifications</h3>
    </div>
    
    <table>
    <h2>Tender Notifications</h2>
        <tr>
            <th>Notification id</th>
            <th>Item id</th>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Quantity</th>
            <th>District</th>
            <th>Bidding start</th>
            <th>Bidding close</th>
            <th>Action</th>
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
             echo "<td><a class='apply-link' href='apply.php?notification_id=" . $row['notification_id'] . "&item_id=" . $row['item_id'] . "&itemname=" . $row['itemname'] . "'>Apply</a></td>";
          
             echo "</tr>";
         }
     } else {
         echo "0 results";
     }
     ?>
    </table>

    <div class="side">
         <ul>
            <li ><a href="supplier_dashboard.php">Bidder Home</a></li>
            <li class="select"><a href="viewnotifi.php">View Notifications</a></li>
            <li><a href="viewapplied.php">View Applied Tender</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul> 
    </div>
    
</body>
</html>



