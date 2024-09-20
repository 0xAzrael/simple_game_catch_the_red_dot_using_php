<?php
$servername = "localhost";
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "mini_game"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $conn->real_escape_string($_POST['first_name']);
    $score = (int) $_POST['score'];

    $sql = "INSERT INTO scores (first_name, score) VALUES ('$user', $score)";
    if ($conn->query($sql) === TRUE) {
        echo "Score saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
