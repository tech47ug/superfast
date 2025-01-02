<?php
// ... (Database connection)

// Add product to cart (session-based)
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    // ... (Logic to add the product to the session cart)
}

// Display ccart items
// ... (Logic to retrieve cart items from the session)