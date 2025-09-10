<?php
require 'db.php';
$pageTitle = t('add_new_listing');
require 'templates/header.php';

// Only logged-in users can add a listing
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Use the ID of the logged-in user
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $location = $_POST['location'];
    $listing_type = $_POST['listing_type'];

    $stmt = $pdo->prepare("INSERT INTO listings (user_id, title, description, price, location, listing_type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $title, $description, $price, $location, $listing_type]);

    header("Location: listings.php");
    exit;
}
?>
    <h1><?= t('add_new_listing') ?></h1>
    <form method="POST">
        <label><?= t('title') ?>: <input type="text" name="title" required></label>
        <label><?= t('description') ?>: <textarea name="description"></textarea></label>
        <label><?= t('price') ?>: <input type="number" step="0.01" name="price" required></label>
        <label><?= t('location') ?>: <input type="text" name="location" required></label>
        <label><?= t('type') ?>:
            <select name="listing_type">
                <option value="machine"><?= t('machine') ?></option>
                <option value="spare_part"><?= t('spare_part') ?></option>
                <option value="animal"><?= t('animal') ?></option>
                <option value="job"><?= t('job') ?></option>
                <option value="property"><?= t('property') ?></option>
                <option value="service"><?= t('service') ?></option>
                <option value="product"><?= t('product') ?></option>
                <option value="source_material"><?= t('source_material') ?></option>
                <option value="other"><?= t('other') ?></option>
            </select>
        </label>
        <button type="submit"><?= t('add_listing_button') ?></button>
    </form>
<?php
require 'templates/footer.php';
?>
