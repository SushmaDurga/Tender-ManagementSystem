 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Granted Tender</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
         <h3>Granted Tenders</h3>

    </div>
    
    <table>
    <h2>Granted Tenders</h2>
        <tr>
            <th>BidderID</th>
            <th>BName</th>
            <th>Company</th>
            <th>Notification Id</th>
            <th>Item Id</th>
            <th>Item name</th>
            <th>Bidding Price(INR)</th>
            <th>Warranty</th>
            <th>Manufacture Date</th>
            <th>Status</th>
        </tr>
        <?php
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name1 = "additem";
        $db_name2 = "addsupplier";

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name1);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT sd.id, sd.username, sd.companyname, i.notification_id, i.item_id, i.itemname, ta.bidding_amount, ta.warranty_details, ta.manufacturing_year,ta.status FROM additem.items i 
                INNER JOIN addsupplier.tender_applications ta ON i.notification_id = ta.notification_id AND i.item_id = ta.item_id 
                INNER JOIN addsupplier.supplier_details sd ON ta.id = sd.id
                WHERE ta.status = 'Approved'"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['companyname'] . "</td>";
                echo "<td>" . $row['notification_id'] . "</td>";
                echo "<td>" . $row['item_id'] . "</td>";
                echo "<td>" . $row['itemname'] . "</td>";
                echo "<td>" . $row['bidding_amount'] . "</td>";
                echo "<td>" . $row['warranty_details'] . "</td>";
                echo "<td>" . $row['manufacturing_year'] . "</td>";
                if($row['status'] == 'Approved') {
                    echo "<td style='background-color: green; color:white;font-weight:bolder;'>" . $row['status'] . "</td>";
                } else {
                    echo "<td style='background-color: yellow'>" . $row['status'] . "</td>";
                }
    
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>0 results</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <div class="side">
        <ul>
            <li ><a href="admin.php">Admin Home</a></li>
            <li><a href="addemployee.php">Add Issuer</a></li>
            <li><a href="viewemployee.php">View Issuer Details</a></li>
            <li ><a href="viewsuppliers.php">View Bidders Details</a></li>
            <li ><a href="suppliertender.php">Tenders</a></li>
            <li class="select"><a href="granted.php">Granted Tenders</a></li>
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul>
    </div>
    
</body>
</html>