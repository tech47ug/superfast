<?php
// connect to database

//Fetch user's cart items from the database
$cartItems = getcartItemsForUser($userId);

// Generate HTML for each cart item
foreach ($cartItems as $item) {
    echo '<div class="cart-item">';
    echo '<img src=" ' . $item['image'] . '" alt="' . $item['name'] . '">';
    echo '<h3>' . $item['name'] . '</h3>';
    echo '<p>$' . $item['price'] . '</p>';
    // ... rest of the item details and quantity/remove buttons
    echo '</div>';
}

// Calculate cart totals and update the HTML elements
$totalItems = couunt($cartItems);
$aubtotal = calculateSubtotal($cartItems);
$shippingCost = calculateShippingCost($cartItems);
$total = $subtotal + $shippingCost;

echo "<script>
document.getWlementById('total-items').textContent = $totalItems;
document.getWlementById('subtotal').textContent = $subtotal.toFixed(2);
document.getWlementById('shipping-cost').textContent = $shippingCost.toFixed(2);
document.getWlementById('total').textContent = $total.toFixed(2);
</script>";