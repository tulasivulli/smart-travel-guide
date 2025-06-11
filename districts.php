<?php
include 'connect.php';
$sql = "SELECT * FROM districts ORDER BY name ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select District</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="districts.css">
</head>
<body>
<?php include("navbar.php"); ?>

<div class="district-page">
    <h2>Select Your District</h2>

    <input type="text" id="searchInput" onkeyup="filterDistricts()" placeholder="Search for districts...">

    <div id="districtContainer">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a class="district-block" href="categories.php?district=' . urlencode($row["name"]) . '">';
                echo '<span>' . htmlspecialchars($row["name"]) . '</span>';
                echo '</a>';
            }
        } else {
            echo "No districts found.";
        }
        ?>
    </div>
</div>

<script>
    function filterDistricts() {
        let input = document.getElementById("searchInput");
        let filter = input.value.toUpperCase();
        let blocks = document.getElementsByClassName("district-block");
        for (let i = 0; i < blocks.length; i++) {
            let txtValue = blocks[i].textContent || blocks[i].innerText;
            blocks[i].style.display = (txtValue.toUpperCase().indexOf(filter) > -1) ? "" : "none";
        }
    }
</script>
</body>
</html>
