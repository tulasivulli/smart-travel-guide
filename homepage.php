<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>SmartTravel - Homepage</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navbar.css" />
    <link rel="stylesheet" href="homepage.css" />
    <link rel="stylesheet" href="carousel.css" />  <!-- New external CSS file -->
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="carousel">
        <div class="carousel-slide active" style="background-image: url('background imgs/road.avif');"></div>
        <div class="carousel-slide" style="background-image: url('background imgs/temple.avif');"></div>
        <div class="carousel-slide" style="background-image: url('background imgs/fog.avif');"></div>
        <div class="carousel-slide" style="background-image: url('background imgs/filght.avif');"></div>
        <div class="carousel-slide" style="background-image: url('background imgs/road2.avif');"></div>
    </div>

    <div class="home-container">
        <h1>Welcome to SmartTravel</h1>

        <?php 
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = mysqli_query($conn, "SELECT * FROM `login` WHERE email='$email'");
            if ($row = mysqli_fetch_array($query)) {
                echo "<h1>" . htmlspecialchars($row['firstName']) . " " . htmlspecialchars($row['lastName']) . "</h1>";
            }
        }
        ?>

        <form action="districts.php" method="get">
            <button type="submit">Enter</button>
        </form>
    </div>

    <script>
      const slides = document.querySelectorAll('.carousel-slide');
      let current = 0;

      function nextSlide() {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
      }

      setInterval(nextSlide, 3000);
    </script>
</body>
</html>
