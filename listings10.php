<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM listings ORDER BY created_at DESC LIMIT 10");
$listings = $stmt->fetchAll();

if (count($listings) > 0) {
    echo "<table class='listings-table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>" . t('title') . "</th>";
    echo "<th>" . t('description') . "</th>";
    echo "<th>" . t('price') . "</th>";
    echo "<th>" . t('type') . "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($listings as $row) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
        echo "<td>" . htmlspecialchars(substr($row["description"], 0, 100)) . (strlen($row['description']) > 100 ? '...' : '') . "</td>";
        $price = $row["price"] !== null ? "$" . number_format($row["price"], 2) : "N/A";
        echo "<td>" . $price . "</td>";
        echo "<td>" . htmlspecialchars(ucfirst(str_replace('_', ' ', $row["listing_type"]))) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No listings available.</p>";
}
?>
<div class="all-listings-link">
    <a href="listings.php">All Listings</a>
</div>
