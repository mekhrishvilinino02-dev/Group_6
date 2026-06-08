<?php
require_once 'data.php';
require_once 'components.php';

renderHeader($menu_items);
?>

<main class="container page-spacing">
    <div class="section-header">
        <h1 class="section-title">Enterprise System Modules & Architecture</h1>
        <p class="section-subtitle">Deep technological solutions designed to completely eliminate paperwork and manual processing errors.</p>
    </div>

    <div class="services-grid">
        <?php foreach ($services as $service): ?>
            <div class="service-card">
                <div class="service-icon"><?= $service['icon'] ?></div> 
                <h3><?= htmlspecialchars($service['title']); ?></h3>
                <p><?= htmlspecialchars($service['text']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="feature-detail-row">
        <div class="detail-text">
            <h2>Advanced Bank-Grade Security & Access Protocols</h2>
            <p>Your institutional and community data is heavily guarded by encrypted off-site multi-servers and strict role-based user token management.</p>
            <ul class="feature-bullets">
                <li>✓ Full GDPR, CCPA, and regional privacy framework compliance.</li>
                <li>✓ Instant automated multi-factor authentication (MFA) system activation.</li>
                <li>✓ Cryptographic secure socket layer (SSL) protection across all domains.</li>
            </ul>
        </div>
        <div class="detail-img-box">
            <img src="imgs/work_shift.jpg" alt="Advanced Cyber Security Architecture">
        </div>
    </div>
</main>

<?php renderFooter(); ?>