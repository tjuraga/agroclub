<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $role]);
       // header("Location: manage_users.php");
        exit;
    } catch (PDOException $e) {
        // Check if it's a duplicate entry error (SQLSTATE 23000)
        if ($e->getCode() == '23000') {
            $error = "Username already exists. Please choose a different one.";
        } else {
            $error = "A database error occurred. Please try again.";
        }
    }
}
?>

<h2>Add New User</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" class="admin-form">
    <label>Username: <input type="text" name="username" required></label>
    <label>Password: <input type="password" name="password" required></label>
    <label>Role:
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </label>
    <button type="submit">Add User</button>
</form>

