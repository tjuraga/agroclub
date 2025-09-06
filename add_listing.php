<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 1; // temporary default
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

<!DOCTYPE html>
<html>
<head>
    <title>Add Listing</title>
</head>
<body>
    <h1>Add New Listing</h1>
    <form method="POST">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Description: <textarea name="description"></textarea></label><br>
        <label>Price: <input type="number" step="0.01" name="price" required></label><br>
        <label>Location: <input type="text" name="location" required></label><br>
        <label>Type:
            <select name="listing_type">
                <option value="machine">Machine</option>
                <option value="spare_part">Spare Part</option>
                <option value="animal">Animal</option>
                <option value="job">Job</option>
                <option value="property">Property</option>
                <option value="service">Service</option>
                <option value="product">Product</option>
                <option value="source_material">Source Material</option>
                <option value="other">Other</option>
            </select>
        </label><br><br>
        <button type="submit">Add Listing</button>
    </form>
</body>
</html>
