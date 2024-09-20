<?php
include 'conn.php';

function registerUser($conn, $first_name, $last_name, $email, $password) {
    $query = "SELECT id FROM user_tbl WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return "email already exists!";
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "INSERT INTO user_tbl (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashedPassword')";
    
    if ($conn->query($query) === TRUE) {
        return "User registered successfully!";
    } else {
        return "Error: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $result = registerUser($conn, $first_name, $last_name, $email, $password);

    if ($result === "User registered successfully!") {
        echo "<script>alert('$result'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('$result'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
