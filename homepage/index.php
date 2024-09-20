<?php

include '../conn.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT id, first_name FROM user_tbl WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $first_name = $user['first_name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameHub</title>
    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .console {
            background-color: #2d2d2d;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.7);
            width: 400px;
            padding: 20px;
            text-align: center;
        }

        .console p {
            font-size: 20px;
            margin-bottom: 20px;
            color: #00ff00;
            font-family: 'Courier New', Courier, monospace;
        }

        .console a {
            display: block;
            margin: 15px 0;
            padding: 10px;
            background-color: #3b3b3b;
            color: #00ff00;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .console a:hover {
            background-color: #505050;
        }

        .console img {
            margin: 10px 0;
            width: 80%;
            border-radius: 10px;
        }

        .console .screen {
            background-color: #0f0f0f;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.7);
        }

        .console h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #00ff00;
        }
    </style>
</head>
<body>

<div class="console">
    <div class="screen">
        <h1>GameHub</h1>
        <p>Welcome, Gamer! <?php echo htmlspecialchars($first_name); ?></p>
    </div>
    <a href="../catch_the_circle/">Catch Me
    <img src="../image/redball.jpg" alt="Game Thumbnail"></a>
    
    
    
</div>

</body>
</html>


<?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID is not set in the session.";
}
?>