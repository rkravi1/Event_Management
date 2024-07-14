<?php include("includes/db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <?php
                session_start();
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="dashboard.php">Dashboard</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="register.php">Register</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome to the Event Management System</h1>
        <p>Discover and book the best events happening around you!</p>

        <section class="events">
            <h2>Upcoming Events</h2>
            <?php
            $sql = "SELECT * FROM Events ORDER BY event_date ASC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='event'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Date: " . $row['event_date'] . "</p>";
                    echo "<a href='event.php?id=" . $row['event_id'] . "'>View Details</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No upcoming events.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Event Management System</p>
    </footer>
</body>
</html>
