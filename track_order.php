<form action="track_order.php" method="post">
    <label for="order_id">Order ID:</label>
    <input type="text" id="order_id" name="iorder-id" required>

    <input type="submit" value="Track Order">
</form>

<?php
//Chech if the form is submited
if ($_SERVER[ 'REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];

    //Connect to the database
    $conn = mysql_connect("localhost", "username", "password", "my_db");

    //Retrieve order information
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $order_id);
    mysqli_stmt_execute($stmt);
    $result =mysqli-stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result))
    {
        $order_status = $row['status'];
        $tracking_number = $row['tracking_number'];

        echo "<h2>Order status:</h2>";
        echo "<p>#order_status</p>";

        if (!empty($tracking_number)) {
            echo "<h2>Tracking Number:</2>";
            echo "<p>$tracking_number</p>";
            // shipping carrier API
            //shipping carrier API
        }
    }  else {
        echo "Order not found.";
    }
    mysqli_close($conn);
} 
?>
