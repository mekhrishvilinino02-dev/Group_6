<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function renderHeader() { 
    $menu_links = [
        "Home" => "index.php",
        "Features" => "features.php",
        "Community" => "community.php",
        "Blog" => "blog.php",
        "Pricing" => "pricing.php"
    ];

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nexcent - Responsive Portal</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <header class="site-header">
        <div class="container nav-box">
            <a href="index.php" class="logo">
                <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.5 0L32 12L21.5 24H10.5L0 12L10.5 0H21.5Z" fill="#4CAF50"/></svg>
                Nex<span>cent</span>
            </a>
            <button class="menu-toggle" id="mobile-menu-btn"><span></span><span></span><span></span></button>
            <ul class="nav-links" id="nav-menu">';
                foreach ($menu_links as $name => $link) {
                    echo '<li><a href="' . $link . '" class="nav-link-item">' . $name . '</a></li>';
                }
                if (isset($_SESSION['user_name'])) {
                    echo '<li><span class="user-welcome">👋 ' . htmlspecialchars($_SESSION['user_name']) . '</span></li>
                          <li><a href="logout.php" class="btn-primary btn-logout">Logout</a></li>';
                } else {
                    echo '<li><a href="register.php" class="btn-primary">Register Now</a></li>';
                }
    echo '</ul></div></header>';
}

function renderHero() {
    $is_logged = isset($_SESSION['user_name']);
    $title = $is_logged ? "Welcome back, <span>" . htmlspecialchars($_SESSION['user_name']) . "!</span>" : "Lessons and insights <span>from 8 years</span>";
    $btn = $is_logged ? "Explore Dashboard" : "Register";
    $link = $is_logged ? "features.php" : "register.php";

    echo '<section class="hero"><div class="container"><div class="hero-flex">
            <div class="hero-text">
                <h1>' . $title . '</h1>
                <p>Where to grow your business as a photographer: site or social media?</p>
                <a href="' . $link . '" class="btn-primary">' . $btn . '</a>
            </div>
            <div class="hero-img"><img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800" alt="Hero"></div>
        </div></div></section>';
}

function renderFooter() {
    echo '<footer class="site-footer"><div class="container">
            <p>&copy; ' . date('Y') . ' Nexcent Open Portal. All rights reserved.</p>
          </div></footer>
          <script src="script.js"></script></body></html>';
}
?>