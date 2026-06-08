<?php
require_once 'data.php';
require_once 'components.php';

renderHeader($menu_items);
?>

<main class="container" style="padding-top: 40px;">
<div class="blog-grid">
    <?php foreach ($blogs as $blog): ?>
        <div class="blog-card">
            <div class="blog-img-wrapper">
                <img src="<?= htmlspecialchars($blog['image']) ?>" alt="Blog Image" class="blog-img">
            </div>
            
            <div class="blog-content">
                <h4><?= htmlspecialchars($blog['title']) ?></h4>
                <p class="blog-excerpt"><?= htmlspecialchars($blog['excerpt']) ?></p>
                <div class="blog-date">Published on: <?= htmlspecialchars($blog['date']) ?></div>
                <a href="#" class="read-more-link">Read Full Article →</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</main>

<?php
renderFooter();
?>