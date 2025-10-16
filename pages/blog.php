<?php
$pdo = db_connect();
$stmt = $pdo->query("SELECT id,title,excerpt,created_at FROM posts ORDER BY created_at DESC LIMIT 6");
$posts = $stmt->fetchAll();
?>
<section>
    <h1>Blog & News</h1>
    <div class="posts">
        <?php foreach ($posts as $post): ?>
            <article class="post-card glass">
                <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                <a href="<?php echo BASE_URL; ?>/?page=blog&id=<?php echo $post['id']; ?>">Read more</a>
            </article>
        <?php endforeach; ?>
    </div>
</section>