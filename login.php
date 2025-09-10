<?php
require 'db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: /admin/index.php");
        } else {
            header("Location: /index.php");
        }
        exit;
    } else {
        // --- Enhanced Debugging ---
        // This provides more specific feedback for you.
        // In a live production environment, you should only use the generic error message "Invalid username or password."
        if (!$user) {

            $error = "DEBUG: No user found with that username. Please check the spelling and case-sensitivity.";
        } else {
            $error = "DEBUG: User found, but the password is incorrect. Try resetting it with the new script.";
        }
    }
}

$pageTitle = 'Login';
require 'templates/header.php';
?>

<h1>Login</h1>

<?php if ($error): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST" style="max-width: 400px; margin: 20px auto;">
    <label>Username:
        <input type="text" name="username" required>
    </label>
    <label>Password:
        <input type="password" name="password" required>
    </label>
    <button type="submit">Login</button>
</form>

<?php require 'templates/footer.php'; ?>