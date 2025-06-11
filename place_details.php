<?php
include 'connect.php';

// Get category and district from URL to use in back button
$category = isset($_GET['category']) ? $_GET['category'] : '';
$district = isset($_GET['district']) ? $_GET['district'] : '';

// Check if id parameter is present
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Invalid place ID.');
}

$place_id = intval($_GET['id']);

// Get place details
$stmt = $conn->prepare("SELECT name, description, timings, days_open, location, food, rules, dress_code FROM place_details WHERE place_id = ?");
$stmt->bind_param("i", $place_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Place not found.");
}

$place = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($place['name']); ?> - Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="place_details.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="place-details">
    <h1><?php echo htmlspecialchars($place['name']); ?></h1>
    <p><strong>Description:</strong> <?php echo nl2br(htmlspecialchars($place['description'])); ?></p>
    <p><strong>Timings:</strong> <?php echo htmlspecialchars($place['timings']); ?></p>
    <p><strong>Days Open:</strong> <?php echo htmlspecialchars($place['days_open']); ?></p>
    <p><strong>Location:</strong> <?php echo htmlspecialchars($place['location']); ?></p>
    <p><strong>Food:</strong> <?php echo htmlspecialchars($place['food']); ?></p>
    <p><strong>Rules:</strong> <?php echo htmlspecialchars($place['rules']); ?></p>
    <p><strong>Dress Code:</strong> <?php echo htmlspecialchars($place['dress_code']); ?></p>

    <br><br>
    <a href="places.php?category=<?php echo urlencode($category); ?>&district=<?php echo urlencode($district); ?>">
        <button>Back to Places</button>
    </a>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
