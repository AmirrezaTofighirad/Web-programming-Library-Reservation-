<?php
session_start(); 

require('DBconnection.php');

// Function to sanitize input
function sanitize($data) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

// Check if email already exists
function emailExists($email) {
    global $conn;
    $email = sanitize($email);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// Validate password strength
function validatePassword($password) {
    return true; // Implement actual validation if needed
}

// Process the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    if (emailExists($email)) {
        echo "Error: Email already exists. Please choose a different email.";
        exit();
    }

    // Validate password
    if (!validatePassword($password)) {
        echo "Error: Password does not meet requirements.";
        exit();
    }

    // Sanitize and collect other inputs
    $firstname = sanitize($_POST['firstname']);
    $lastname = sanitize($_POST['lastname']);
    $gender = sanitize($_POST['gender']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);

    // Prepare SQL query
    $sql = "INSERT INTO users (firstname, lastname, gender, phone, address, email, password)
            VALUES ('$firstname', '$lastname', '$gender', '$phone', '$address', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['email'] = $email; 
        
        // Redirect to login page
        if (file_exists('login.php')) {
            header("Location: login.php");
        } else {
            echo "Error: Redirection file not found.";
        }
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
