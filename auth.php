<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Auth {
    public static function register($name, $email, $password) {
        if (empty($name) || empty($email) || empty($password)) {
            return "Please fill in all fields!";
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $_SESSION['registered_user'] = [
            'name' => htmlspecialchars(trim($name)),
            'email' => filter_var(trim($email), FILTER_SANITIZE_EMAIL),
            'password' => $hashedPassword
        ];
        return true;
    }

    public static function login($email, $password) {
        if (isset($_SESSION['registered_user'])) {
            $user = $_SESSION['registered_user'];
            if ($email === $user['email'] && password_verify($password, $user['password'])) {
                $_SESSION['user_name'] = $user['name'];
                return true;
            }
        }
        return "Invalid Email or Password!";
    }
}
?>