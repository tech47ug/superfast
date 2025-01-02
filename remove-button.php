<?phpsession_start();

if (isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];

    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header('Location: cart.php') // rEdirect to the cart page
    exit();
}
?>