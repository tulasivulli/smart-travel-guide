<?php
include 'connect.php';
// Get the selected category and district from the URL safely
$category = isset($_GET['category']) ? $_GET['category'] : '';
$district = isset($_GET['district']) ? $_GET['district'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Places in <?php echo htmlspecialchars($category); ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="places.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php include 'navbar.php'; ?> <!-- Navbar visible at top -->

<div class="places-container">
<?php
// Fetch all places in the selected category for the district
$sql = "SELECT * FROM places WHERE category = ? AND district = ? ORDER BY name ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $category, $district);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $imageUrl = htmlspecialchars($row["image_url"]);
        $extensions = ['.jpg', '.jpeg', '.webp', '.avif', '.png', '.gif'];
        $pathWithoutExt = preg_replace('/\.(jpg|jpeg|webp|avif|png|gif)$/i', '', $imageUrl);
        $finalImageUrl = 'images/default.jpg';

        foreach ($extensions as $ext) {
            $candidate = $pathWithoutExt . $ext;
            $fullPathCandidate = $_SERVER['DOCUMENT_ROOT'] . '/' . $candidate;
            if (file_exists($fullPathCandidate)) {
                $finalImageUrl = $candidate;
                break;
            }
        }

        echo '<div class="place">';
        echo '<a href="place_details.php?id=' . urlencode($row["id"]) . 
             '&category=' . urlencode($category) . 
             '&district=' . urlencode($district) . '">';
        echo '<img src="' . $finalImageUrl . '" alt="' . htmlspecialchars($row["name"]) . '" >';
        echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "<p>No places found in this category.</p>";
}

$stmt->close();
?>
</div>

<!-- Back to Categories Button -->
<form action="categories.php" method="get" style="text-align: center; margin-top: 20px;">
    <input type="hidden" name="district" value="<?php echo htmlspecialchars($district); ?>">
    <button type="submit" class="btn">Back to Categories</button>
</form>

</body>
</html>
