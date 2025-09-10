<?php
require 'admin_header.php';

$id = $_GET['user_id'] ?? null;
if (!$id) {
    header("Location: manage_users.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    try {
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET username = ?, role = ?, password = ? WHERE user_id = ?");
            $stmt->execute([$username, $role, $hashed_password, $id]);
        } else {
            $stmt = $pdo->prepare("UPDATE users SET username = ?, role = ? WHERE user_id = ?");
            $stmt->execute([$username, $role, $id]);
        }

        header("Location: manage_users.php");
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == '23000') {
            $error = "That username is already taken. Please choose another.";
        } else {
            $error = "A database error occurred.";
        }
    }
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    header("Location: manage_users.php");
    exit;
}
?>

<h2>Edit User</h2>

<?php if (!empty($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" class="admin-form">
    <label>Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required></label>
    <label>Role:
        <select name="role">
            <option value="user" <?= ($user['role'] == 'user') ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
        </select>
    </label>
    <hr>
    <p>Leave password blank to keep it unchanged.</p>
    <label>New Password: <input type="password" name="password"></label>

    <button type="submit">Update User</button>
</form>

<?php require 'admin_footer.php'; ?>