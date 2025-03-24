<?php
session_start(); // Start session for error messages
include 'db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUp'])) {
    $fName = trim($_POST['fName']);
    $lName = trim($_POST['lName']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password

    // Check if email already exists
    $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        $_SESSION['error'] = "Email already registered!";
        header("Location: index.php");
        exit();
    } else {
        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (fName, lName, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fName, $lName, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Registration successful! Please log in.";
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['error'] = "Error: Could not register.";
            header("Location: index.php");
            exit();
        }
        $stmt->close();
    }
    $check_email->close();
}

$conn->close();
?>
