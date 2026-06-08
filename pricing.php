<?php
require_once 'data.php';
require_once 'components.php';

renderHeader($menu_items);
?>

<main class="container page-spacing">
<div class="section-header">
        <h1 class="section-title">Honest & Simple Pricing</h1>
        <p class="section-subtitle">Choose the perfect plan for your organization or community group.</p>
    </div>

    <div class="pricing-grid">
        <div class="pricing-card">
            <h3>Basic Plan</h3>
            <p class="plan-desc">For small community clubs</p>
            <div class="price">$19<span>/month</span></div>
            <ul class="features-list">
                <li>✓ Up to 100 Members</li>
                <li>✓ Automated Renewal Mails</li>
                <li>✓ Basic Analytics</li>
                <li class="disabled">✕ Custom Branding</li>
            </ul>
            <a href="#" class="btn-primary btn-outline">Get Started</a>
        </div>

        <div class="pricing-card popular">
            <span class="popular-badge">Popular</span>
            <h3>Business Plan</h3>
            <p class="plan-desc">For national associations</p>
            <div class="price">$49<span>/month</span></div>
            <ul class="features-list">
                <li>✓ Up to 5,000 Members</li>
                <li>✓ Automated Payments</li>
                <li>✓ Advanced Reports</li>
                <li>✓ Custom Branding</li>
            </ul>
            <a href="#" class="btn-primary">Get Started</a>
        </div>

        <div class="pricing-card">
            <h3>Enterprise</h3>
            <p class="plan-desc">For large scale systems</p>
            <div class="price">$99<span>/month</span></div>
            <ul class="features-list">
                <li>✓ Unlimited Members</li>
                <li>✓ Dedicated Manager</li>
                <li>✓ API Integration</li>
                <li>✓ 24/7 Priority Support</li>
            </ul>
            <a href="#" class="btn-primary btn-outline">Contact Us</a>
        </div>
    </div>

    <section class="faq-section">
        <h2 class="inner-section-title text-center">Frequently Answered Queries</h2>
        <div class="faq-container">
            <?php if (isset($faqs) && is_array($faqs)): ?>
                <?php foreach ($faqs as $faq): ?>
                    <div class="faq-item">
                        <h4>❓ <?= htmlspecialchars($faq['question'] ?? '') ?></h4>
                        <p><?= htmlspecialchars($faq['answer'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Currently, there are no frequently asked questions available.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php renderFooter(); ?>