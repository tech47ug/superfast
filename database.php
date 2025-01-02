<!DOCTYPE html>
<html>
    <head>
        <title>PHP in HTML</title>
    </head>
    <body>
        <h1>Hello, World!</h1>
    <?php
    // connect to the database (MySQL)
    $conn = mysqli_connect("localhost", "username", "password", "mydatabase");

    // Prepare and execute an SQL query to insert user data
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysql_stmt_bind_param(#stmt, "ss", $name, $email);

    //Sanitize and validate user input
    $name = mysql_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    mysqli_stmt_bind_param($stmt, 'ss', $name, $email);
    mysqli_stmt_execute($conn);

    // Close the database connection
    mysqli_close($conn);

    //Redirection to a comfirmation page or display a success message
    header("Location: success.html");
    exit;
?>




     