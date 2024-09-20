<?php

include '../conn.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $query = "SELECT `id`, `first_name` FROM `user_tbl` WHERE `id` = ?";
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
    <title>Mini Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <a href="../homepage/">MENU</a>
        <h1>Catch the Red Ball</h1>
        <div id="gameArea">
            <div id="circle"></div>
        </div>
        <button id="startGame" class="btn">Start Game</button>
        <div id="scoreBoard">Score: 0</div>
        <form id="submitScore" method="POST" action="submit_score.php" class="score-form">
            <?php
            $display_name = htmlspecialchars($first_name);
            echo $display_name;
            ?>
            <br>
            <input type="hidden" name="first_name" value="<?php echo $display_name; ?>">
            <input type="hidden" name="score" id="scoreInput">
            <button type="submit" class="btn">Submit Score</button>
        </form>
        <form action="leaderboard.php" method="GET">
            <button type="submit" class="btn">View Leaderboard</button>
        </form>
       
    </div>

    <script src="game.js"></script>
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
