
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
            <h3>Home</h3>

    </div>
    
    <table>
    <h2>VHome</h2>
        <tr>
            <th>Notification ID</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Bid Starting</th>
            <th>Bid Closing</th>
            <th>Bidding price</th>
            <th>Tender goes to</th>
        </tr>

<?php
$db_user = "root";
$db_password = "";
$db_name = "additem";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT  i.notification_id, i.item_id, i.itemname, i.description,i.quantity,i.biddingstart,i.biddingclose,ta.bidding_amount,ta.status,sd.companyname FROM additem.items i 
INNER JOIN addsupplier.tender_applications ta ON i.notification_id = ta.notification_id AND i.item_id = ta.item_id 
INNER JOIN addsupplier.supplier_details sd ON ta.id = sd.id
WHERE ta.status = 'Approved'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['notification_id'] . "</td>";
        echo "<td>" . $row['item_id'] . "</td>";
        echo "<td>" . $row['itemname'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . $row['biddingstart'] . "</td>";
        echo "<td>" . $row['biddingclose'] . "</td>";
        echo "<td>" . $row['bidding_amount'] . "</td>";
        echo "<td>" . $row['companyname'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}
?>

    </table>


   
    <div class="side">
        
        <ul>
          <li class="select"><a href="top.php">Home</a></li>
          <li><a href="admin.php">Admin</a></li>
          <li><a href="employee.php">Tender Issuer</a></li>
          <li><a href="supplier.php">Bidder</a></li>
          <li class="back"><a href="test.html">Back</a></li>
        </ul>
    </div>
    
</body>
</html>



