<?php
// connect to ther dabase
$conn = mysqli_connect("localhost", "username", "password", "my_db");

// Fetch products from the database
$aql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Seromart Online Storte</title>
    </head>
    <body>
        <h1>Products</h1>
        <?php
        while ($row = mysqli_fetch_assoc($resul;t)) {
            echo "<div>";
            echo "h2" . $row['name'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>price: $" . $row['price'] . "</p>";
            echo "<a href='cartr.php?product_id=" . $row['product_id'] . "'Add to cart</a>";
            echo "</div>";
        }
        ?>
    </body>
    </html>