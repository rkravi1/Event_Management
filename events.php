<?php include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Events</h1>
    <?php
    $sql = "SELECT * FROM Events ORDER BY event_date ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='event'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Date: " . $row['event_date'] . "</p>";
            echo "<a href='event.php?id=" . $row['event_id'] . "'>View Details</a>";
            echo "</div>";
        }
    } else {
        echo "No events found.";
    }
    ?>
</body>
</html>
