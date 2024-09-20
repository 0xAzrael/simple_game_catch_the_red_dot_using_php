<?php

include '../conn.php';
session_start();

// Query to get all scores
$query = "
    SELECT id, first_name, score, created_at 
    FROM scores
    ORDER BY score DESC, created_at ASC
    LIMIT 10"; // Limiting to top 10 scores

$result = $conn->query($query);

// Check if the query was successful
if ($result === false) {
    // Output the SQL error
    die("Error in query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Leaderboard</h1>
        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $rank = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rank . "</td>";
                        echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['score']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "</tr>";
                        $rank++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No scores available</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Back to Game</a>
    </div>
</body>
</html>
