<?php include("includes/db.php"); include("includes/functions.php"); redirectIfNotLoggedIn(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fstyle.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i><b>RK Event</b></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


    <?php
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM Users WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Welcome, " . $row['username'] . "!</h2>";
    } else {
        echo "User not found.";
    }

    $sql = "SELECT * FROM Bookings JOIN Events ON Bookings.event_id = Events.event_id WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Your Bookings</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='booking'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>Date: " . $row['event_date'] . "</p>";
            echo "<p>Booking Date: " . $row['booking_date'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No bookings found.";
    }
    ?>
    <select class="form-select" aria-label="Default select example">
       <option selected>Enter your event place place</option>
       <option value="1">jharkhnad</option>
       <option value="2">Mumbai</option>
       <option value="3">Bhopal</option>
       <option value="1">Jabalpur</option>
       <option value="2">Ranchi</option>
       <option value="3">Raipur</option>
    </select>
    <div class="a">
        <img src="photo/1.avif" class="img-thumbnail" alt="...">
        <img src="photo/2.avif" class="img-thumbnail" alt="...">
        <img src="photo/3.avif" class="img-thumbnail" alt="...">
        <img src="photo/4.avif" class="img-thumbnail" alt="...">
    </div>
    
    <div class="b">
        <img src="photo/6.avif" class="img-thumbnail" alt="...">
        <img src="photo/7.avif" class="img-thumbnail" alt="...">
        <img src="photo/8.avif" class="img-thumbnail" alt="...">
        <img src="photo/9.avif" class="img-thumbnail" alt="...">
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
