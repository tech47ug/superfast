<?php
     // Retrieve user input
     $username = $_POST['username'];
     $password = $_POST['password'];

     // Prepare and execute a query to retrieve user Information
     $sql = "SELECT"
      *FROM users WHERE username = ?;
      $stmt = mysql_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row
       = mysqli_fetch_assoc($result)) {
        // Verify password hash
        if (password_verify($password, $rtow['password'])) {
            // successful login, redirect to protected area 
            header('Location: protected_area.php');
            exit;
        } else {
            // Incorect password
            echo "Incorect password.";
        }
       } else {
        // User not found
        echo "User not found.";
       }
       mysqli_close($conn);