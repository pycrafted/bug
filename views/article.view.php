<?php
require_once __DIR__ . '/../utils/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo safeHtml($article['titre']); ?> - MGLSI News</title>
    <link rel="stylesheet" href="/mglsi_news/css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container">
        <article class="article-detail">
            <nav class="article-nav">
                <a href="/mglsi_news/index.php" class="back-link">← Retour aux actualités</a>
            </nav>

            <header class="article-header">
                <h1><?php echo safeHtml($article['titre']); ?></h1>
                <p class="meta">
                    <span class="category"><?php echo safeHtml($article['categorie']); ?></span> | 
                    publié le <?php echo date('d/m/Y à H:i', strtotime($article['dateCreation'])); ?>
                </p>
            </header>

            <div class="article-body">
                <?php if ($article['image']): ?>
                    <figure class="article-image">
                        <img src="/mglsi_news/<?php echo safeHtml($article['image']); ?>" alt="<?php echo safeHtml($article['titre']); ?>">
                        <figcaption><?php echo safeHtml($article['titre']); ?></figcaption>
                    </figure>
                <?php endif; ?>
                <div class="article-content">
                    <p><?php echo nl2br(safeHtml($article['contenu'])); ?></p>
                </div>
            </div>
        </article>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>