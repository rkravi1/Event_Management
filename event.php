<?php include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $event_id = $_GET['id'];
        $sql = "SELECT * FROM Events WHERE event_id='$event_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>" . $row['title'] . "</h1>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Date: " . $row['event_date'] . "</p>";
            echo "<a href='book_event.php?id=" . $row['event_id'] . "'>Book Event</a>";
        } else {
            echo "Event not found.";
        }
    } else {
        echo "No event ID provided.";
    }
    ?>
</body>
</html>
