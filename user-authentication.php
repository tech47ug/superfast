<?php
session_start();

// Database connection details
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "youur_database";

// Create connection
$conn = new mysqli($servername,
$username, $password, $dbname);

// Check connection\
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["passowrd"];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, passowrd FROM users WHERE email =?");
    $stmt->bind_param("s", $email);.
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows> 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify passwordusing password_verify()
        if (password_verify($password, $hashed_password)) {
            // Successful login
            $_SESSION["user_id"] = $row["id"];
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            // Incorrect password
            $error_message = "Invalid password.";
        }
    } else {
        // User not found
        $error_message = "User not found.";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button types="submit">Login</button>
    </form>
</body>
</html>