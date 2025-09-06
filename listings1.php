<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM agriclub.listings");
$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listings</title>
</head>

<body>
    <h1>Marketplace Listings</h1>
    <a href="add_listing.php">Add New Listing</a>

<?php

if ($stmt->rowCount() > 0) {
    echo "<div style='display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='background:#fafafa; border:1px solid #ddd; border-radius:8px; padding:15px; box-shadow:0 2px 4px rgba(0,0,0,0.05);'>";
        echo "<h3 style='margin:0; color:#2e7d32;'>" . htmlspecialchars($row["title"]) . "</h3>";
        echo "<p><strong>Category:</strong> " . htmlspecialchars($row["description"]) . "</p>";
        if ($row["price"] !== null) {
            echo "<p><strong>Price:</strong> $" . number_format($row["price"], 2) . "</p>";
        }
        echo "<p>" . nl2br(htmlspecialchars(substr($row["description"], 0, 100))) . "...</p>";
        echo "<small>Posted on: " . $row["listing_type"] . "</small>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "<p>No listings available.</p>";
}
?>
</body>
</html>
