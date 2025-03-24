<?php
session_start();
include("db.php"); // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Query to check if user exists
    $query = "SELECT id, fName, lName, email, password FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Login successful, store session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fName'];  // First Name
        $_SESSION['last_name'] = $user['lName']; // Last Name
        $_SESSION['user_email'] = $user['email'];

        // Redirect to home page
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid email or password!";
        header("Location: index1.php"); // Redirect back to login page
        exit();
    }
}
?>
