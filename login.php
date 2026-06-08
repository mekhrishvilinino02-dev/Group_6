<?php
require_once 'data.php';
require_once 'components.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (isset($_SESSION['registered_user'])) { 
        $reg_user = $_SESSION['registered_user'];
        if ($email === $reg_user['email'] && $password === $reg_user['password']) {
            $_SESSION['user_name'] = $reg_user['name'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid operational criteria matching parameters!"; 
        } 
    } else { 
        $error_message = "No register history located. Please sign up initially!";
    }
}

renderHeader($menu_items);
?>

<main class="container auth-container">
    <div class="auth-card">
        <h2>Welcome Back</h2>
        <p class="auth-subtitle">Log in to safely manage your active infrastructure</p>

        <?php if (!empty($error_message)): ?>
            <div class="auth-error"><?= $error_message ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="auth-form">
            <div class="form-group">
                <label>Institutional Email</label>
                <input type="email" name="email" required placeholder="name@domain.com">
            </div>
            <div class="form-group">
                <label>Security Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            <button type="submit" class="btn-primary btn-submit">Authorize Session</button>
        </form>

        <p class="auth-redirect">New to Nexcent? <a href="register.php">Create system account</a></p>
    </div>
</main>

<?php renderFooter(); ?>