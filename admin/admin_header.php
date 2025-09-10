<?php
require_once __DIR__ . '/../db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: /login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="admin-header">
        <h1>Admin Panel</h1>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="manage_listings.php">Manage Listings</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="/" target="_blank">View Site</a>
            <a href="/logout.php">Logout</a>
        </nav>
    </header>
    <div class="admin-container">
