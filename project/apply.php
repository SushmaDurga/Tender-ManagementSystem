<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <div class="top-background">
            <h3>Apply Tender</h3>

    </div>
    <div class="regform">
       <center>
        <form method="POST">
            <h3>Apply Tender</h3>
            <br>
            Notification ID : <input type="text" name="notification_id" value="<?php echo $_GET['notification_id']; ?>">
            <br><br>
            Item ID : <input type="text" name="item_id" value="<?php echo $_GET['item_id']; ?>">
            <br><br>
            Item Name : <input type="text" name="itemname" value="<?php echo $_GET['itemname']; ?>">
            <br><br>
            Bidding Amount(INR) : <input type="number" name="bid" id="bid">
            <br><br>
            Warranty Details : <input type="number" name="war" id="war">
            <br><br>
            Manufacturing Year : <input type="date" name="year" id="year">
            <br><br>
            <center>
                <button>Submit</button>
            </center>
        </form>
       </center>
    </div>
    <div class="side">
        <ul>
            <li><a href="supplier_dashboard.php">Bidders Home</a></li>
            <li><a href="viewnotifi.php">View Notifications</a></li>
            <li><a href="viewapplied.php">View Applied Tender</a></li>
            <!-- <li class="back"><a href="viewnotifi.php">Back</a></li> -->
            <li class="out"><a href="top.php">Log Out</a></li>
        </ul> 
    </div>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['notification_id'], $_POST['item_id'], $_POST['itemname'], $_POST['bid'], $_POST['war'], $_POST['year'])) {
        $db_user = "root";
        $db_password = "";
        $db_name = "addsupplier";

     
        $conn = new mysqli("localhost", $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $notification_id = $_POST['notification_id'];
        $item_id = $_POST['item_id'];
        $itemname = $_POST['itemname'];
        $bid = $_POST['bid'];
        $war = $_POST['war'];
        $year = $_POST['year'];

        $sql = "INSERT INTO tender_applications (notification_id, item_id, itemname, bidding_amount, warranty_details, manufacturing_year) 
                VALUES ('$notification_id', '$item_id', '$itemname', '$bid', '$war', '$year')";

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




