<?php
require_once 'data.php';
require_once 'components.php';

renderHeader($menu_items);
?>

<main class="container page-spacing">
    <div class="section-header">
        <h1 class="section-title">A Growing Global Cooperative Network</h1>
        <p class="section-subtitle">We power thousands of fast-growing elite clusters, corporate leagues, and expert associations worldwide.</p>
    </div>

    <div class="community-showcase-row">
        <div class="showcase-img">
            <img src="imgs/digital_workspace.jpg" alt="Nexcent Global Community Network">
        </div>
        <div class="showcase-info">
            <h2>Cultivating Deep Connections via Modern Automation</h2>
            <p>Nexcent provides a beautifully cohesive portal where organizers can effortlessly monitor group parameters, broadcast instant announcements, and analyze behavioral retention analytics flawlessly.</p>
        </div>
    </div>

    <section class="testimonials-grid-section">
        <h3 class="inner-section-title">Words From Experienced System Architects</h3>
        <div class="testimonials-grid">
            <?php if (isset($testimonials) && is_array($testimonials)): ?>
                <?php foreach ($testimonials as $item): ?>
                    <div class="testimonial-card">
                        <p class="quote">"<?= htmlspecialchars($item['quote'] ?? '') ?>"</p>
                        <h5 class="author"><?= htmlspecialchars($item['name'] ?? 'Unknown') ?></h5>
                        <p class="role"><?= htmlspecialchars($item['role'] ?? '') ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Testimonials are currently unavailable.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php renderFooter(); ?>