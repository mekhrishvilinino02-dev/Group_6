<?php
require_once 'data.php';
require_once 'components.php';

renderHeader($menu_items);
renderHero();
?>

<main class="container features-section">
    <div class="section-header">
        <h2 class="section-title">Manage your entire community in a single system</h2>
        <p class="section-subtitle">Who is Nexcent suitable for?</p>
    </div>

    <div class="services-grid">
        <?php foreach ($services as $service): ?>
        <div class="service-card">
            <div class="service-icon">
                <?php
                if ($service['icon'] == 'building') echo '🏢'; 
                elseif ($service['icon'] == 'users') echo '👥';
                elseif ($service['icon'] == 'hands') echo '🤝'; 
                else echo '✨'; 
                ?>
            </div>
            <h3><?php echo htmlspecialchars($service['title']); ?></h3>
            <p class="service-text"><?php echo htmlspecialchars($service['text']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<section class="container feature-detail-section">
    <div class="feature-detail-row">
        <div class="detail-img-box">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800" alt="Unlock Potential Illustration">
        </div>
        <div class="detail-text">
            <h2>The unseen of spending three years on Nexcent</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet justo ipsum. Sed accumsan quam vitae est varius fringilla.</p>
            <button class="btn-primary">Learn More</button>
        </div>
    </div>
</section>

<section class="container blog-section" id="blog">
    <div class="section-header">
        <h2 class="section-title">Caring is the new marketing</h2>
        <p class="section-subtitle">The Nexcent blog is the best place...</p>
    </div>

    <div class="blog-grid">
        <?php foreach (array_slice($blogs, 0, 3) as $blog): ?>
            <div class="blog-card">
                <div class="blog-img-wrapper">
                    <img src="<?= htmlspecialchars($blog['image']) ?>" alt="Blog Image" class="blog-img">
                </div>
                <div class="blog-content">
                    <h4><?= htmlspecialchars($blog['title']) ?></h4>
                    <p class="blog-excerpt"><?= htmlspecialchars($blog['excerpt'] ?? 'აღწერა არ არის...') ?></p>
                    <div class="blog-date">Published on: <?= htmlspecialchars($blog['date'] ?? 'N/A') ?></div>
                    <a href="blog.php" class="read-more-link">Read Full Article →</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php renderFooter(); ?>