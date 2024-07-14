<?php include("includes/db.php"); include("includes/functions.php"); redirectIfNotLoggedIn(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Event</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    if (isset($_GET['id'])) {
        $event_id = $_GET['id'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO Bookings (event_id, user_id, booking_date) VALUES ('$event_id', '$user_id', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "Event booked successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No event ID provided.";
    }
    ?>
</body>
</html>
