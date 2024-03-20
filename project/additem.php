<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item details</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
            <h3>Add items</h3>

    </div>
    <div class="regform">
        <center>
            <h3>Add Items</h3>
        </center>
        <form method="POST">
            Notification ID : <input type="text" id="notification_id" name="notification_id" value="
            <?php

$db_user = "root";
$db_password = "";
$db_name = "additem";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$next_notification_id =1;

$sql_notify = "SELECT MAX(notification_id) AS max_notify_id FROM items";
$result_notify = $conn->query($sql_notify);
if ($result_notify->num_rows > 0) {
    $next_notification_id = $result_notify->fetch_assoc()['max_notify_id'] + 1;
}

$conn->close();
echo $next_notification_id;
?>" readonly>
            <br><br>
            Item ID : <input type="text" id="item_id" name="item_id" value="
            <?php

$db_user = "root";
$db_password = "";
$db_name = "additem";

$conn = new mysqli("localhost", $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$next_item_id = 1;


$sql_item = "SELECT MAX(item_id) AS max_item_id FROM items";
$result_item = $conn->query($sql_item);
if ($result_item->num_rows > 0) {
    $next_item_id = $result_item->fetch_assoc()['max_item_id'] + 1;
}

$conn->close();
echo $next_item_id;
?>" readonly>
            <br><br>
            Item Name : <input type="text" name="name" id="name">
            <br><br>
            Item Description : <input type="text" name="desc" id="desc">
            <br><br>
            Quantity : <input type="number" name="quant" id="quant">
            <br><br>
            District : <input type="text" name="dist" id="dist">
            <br><br>
            Bidding Starting : <input type="date" id="bstart" name="bstart">
            <br><br>
            Bidding Closing : <input type="date" name="bclose" id="bclose">
            <br><br>
            
            <center>
                <button>Submit</button>
            </center>
        
        </form>
        

    </div>

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






<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['notification_id'], $_POST['item_id'], $_POST['name'], $_POST['desc'], $_POST['quant'], $_POST['dist'], $_POST['bstart'], $_POST['bclose'])) {
     
        $db_user = "root";
        $db_password = "";
        $db_name = "additem";

        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $notifyid = $_POST['notification_id'];
        $itemid = $_POST['item_id'];
        $itemname = $_POST['name'];
        $itemdescription = $_POST['desc'];
        $quantity = $_POST['quan'];
        $district = $_POST['dist'];
        $biddingstart = $_POST['bstart'];
        $biddingclose = $_POST['bclose'];


        $sql = "INSERT INTO items (notification_id, item_id, itemname, description, quantity, district, biddingstart, biddingclose) 
                VALUES ('$notifyid', '$itemid', '$itemname', '$itemdescription', '$quantity', '$district', '$biddingstart', '$biddingclose')";

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
