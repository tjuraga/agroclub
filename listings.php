<?php
require 'db.php';
$pageTitle = 'Marketplace Listings';
require 'templates/header.php';

$sql = "SELECT * FROM listings";
$params = [];
$category = null;
$pageHeader = t('listings'); // Default header

if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = $_GET['category'];
    // Whitelist categories to prevent unwanted query parameters
    $allowed_categories = ['property', 'animal', 'machine', 'spare_part', 'product', 'source_material', 'service', 'job', 'other'];
    if (in_array($category, $allowed_categories)) {
        $sql .= " WHERE listing_type = ?";
        $params[] = $category;
        // Use translated category name for the header, falling back to the key
        $categoryName = t($category) === $category ? ucfirst(str_replace('_', ' ', $category)) : t($category);
        $pageHeader = t('listings_in_category') . ': ' . $categoryName;
    } else {
        $category = null; // Invalid category, ignore it
    }
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$listings = $stmt->fetchAll();
?>

    <h1><?= $pageHeader ?></h1>
    <?php if ($category): ?><a href="listings.php" class="clear-filter-link"><?= t('view_all_listings') ?></a><?php endif; ?>
    <a href="add_listing.php" class="add-listing-btn"><?= t('add_new_listing') ?></a>
    <?php if (count($listings) > 0): ?>
        <table class="listings-table">
            <thead>
                <tr>
                    <th><?= t('title') ?></th>
                    <th><?= t('description') ?></th>
                    <th><?= t('price') ?></th>
                    <th><?= t('type') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listings as $listing): ?>
                    <tr>
                        <td><?= htmlspecialchars($listing['title']) ?></td>
                        <td><?= nl2br(htmlspecialchars($listing['description'])) ?></td>
                        <td>
                            <?php
                                $price = $listing["price"] !== null ? "$" . number_format($listing["price"], 2) : "N/A";
                                echo $price;
                            ?>
                        </td>
                        <td><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $listing['listing_type']))) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No listings available yet. <a href="add_listing.php">Be the first to add one!</a></p>
    <?php endif; ?>
<?php
require 'templates/footer.php';
?>
