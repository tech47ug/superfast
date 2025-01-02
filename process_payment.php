<?php
// Handle payment based on the selected method
if (isset($_POST['payment_method'])) {
    $paymentMethod = $_POST['payment_method'];
    if ($paymentMethod == 'credit_card') {
        //Process credit card payment (payment gateway)
        // ... 
    } elseif ($paymentMethod == 'paypal') {
        //Redirect to Paypal's payment page
        //...
    } elseif ($paymentMethod == 'mobile_money') {
        // Process mobile money payment (mobile money API)
        // ...
    } else {
        // Handlee invalid payment method
        echo "invalid payment method"
    }
}