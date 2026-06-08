<?php
require_once 'data.php';
require_once 'components.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        $error_message = "Security verification passwords do not match!";
    } else {
        $_SESSION['registered_user'] = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        $_SESSION['user_name'] = $name;
        header("Location: index.php");
        exit();
    }
}

renderHeader($menu_items);
?>

<main class="container auth-container">
    <div class="auth-card">
        <h2>Create Account</h2>
        <p class="auth-subtitle">Initialize your premium multi-tier portal access today</p>

        <?php if (!empty($error_message)): ?>
            <div class="auth-error"><?= $error_message ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="auth-form">
            <div class="form-group">
                <label>Full Operational Name</label>
                <input type="text" name="name" required placeholder="John Doe">
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="john@domain.com">
            </div>
            <div class="form-group">
                <label>Secure Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <div class="form-group">
                <label>Confirm Secure Password</label>
                <input type="password" name="confirm_password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn-primary btn-submit">Register Portal</button>
        </form>

        <p class="auth-redirect">Already registered? <a href="login.php">Log in directly</a></p>
    </div>
</main>

<?php renderFooter(); ?>