<?php
include 'connect.php';

if (!isset($_GET['district'])) {
    echo "No district selected.";
    exit;
}

$district = $_GET['district'];
$escapedDistrict = $conn->real_escape_string($district);

$sql = "SELECT DISTINCT categories.name, categories.slug 
        FROM categories
        JOIN places ON categories.slug = places.category
        WHERE places.district = '$escapedDistrict'
        ORDER BY categories.name ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Category</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="categories.css">
</head>
<body>
<?php include("navbar.php"); ?>

<h2 class="text-center">Tourist Categories in <?php echo htmlspecialchars($district); ?></h2>

<div class="category-container">
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryName = $row['name'];
        $categorySlug = $row['slug'];

        $urlCategory = urlencode($categorySlug);
        $urlDistrict = urlencode($district);
        echo "<a href='places.php?district=$urlDistrict&category=$urlCategory' class='category-box'>
    $categoryName
</a>";

    }
} else {
    echo "<p class='no-data'>No available categories for this district.</p>";
}
?>
</div>

</body>
</html>
