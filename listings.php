<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM agriclub.listings");
$listings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listings</title>
</head>
<body>
    <h1>Marketplace Listings</h1>
    <a href="add_listing.php">Add New Listing</a>
    <ul>
        <?php foreach ($listings as $listing): ?>
            <li>
                <strong><?= htmlspecialchars($listing['title']) ?></strong><br>
                <?= htmlspecialchars($listing['description']) ?><br>
                Price: $<?= $listing['price'] ?><br>
                Type: <?= $listing['listing_type'] ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
