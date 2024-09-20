<?php
session_start(); 
include 'conn.php'; 
function loginUser($conn, $first_name, $email, $password) {
    $query = "SELECT id, password FROM user_tbl WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $first_name;
            return "Login successful!";
        } else {
            return "Incorrect password!";
        }
    } else {
        return "Username not found!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $result = loginUser($conn, $first_name, $email, $password);
    if ($result === "Login successful!") {
        echo "<script>alert('$result'); window.location.href='catch_the_circle/';</script>";
    } else {
        echo "<script>alert('$result'); window.location.href='index.php';</script>";
    }
}

$conn->close();
?>
