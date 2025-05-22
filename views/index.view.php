<?php
require_once __DIR__ . '/../utils/functions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités MGLSI</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container">
        <?php if ($featured): ?>
            <section class="featured">
                <h1>À la une</h1>
                <div class="featured-article">
                    <img src="../<?php echo safeHtml($featured['image']); ?>" alt="<?php echo safeHtml($featured['titre']); ?>">
                    <div class="featured-content">
                        <h2><?php echo safeHtml($featured['titre']); ?></h2>
                        <p><?php echo truncateText(safeHtml($featured['contenu']), 200); ?></p>
                        <a href="../article.php?id=<?php echo $featured['id']; ?>" class="read-more">Lire l'article</a>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="featured">
                <h1>À la une</h1>
                <p>Aucun article en vedette disponible.</p>
            </section>
        <?php endif; ?>

        <div class="content-wrapper">
            <section class="articles">
                <h2>Dernières nouvelles</h2>
                <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $article): ?>
                        <article class="article-card">
                            <img src="../<?php echo safeHtml($article['image']); ?>" alt="<?php echo safeHtml($article['titre']); ?>">
                            <div class="article-content">
                                <h3><?php echo safeHtml($article['titre']); ?></h3>
                                <p class="category"><?php echo safeHtml($article['categorie']); ?></p>
                                <p><?php echo truncateText(safeHtml($article['contenu']), 100); ?></p>
                                <a href="../article.php?id=<?php echo $article['id']; ?>" class="read-more">Lire la suite</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun article disponible.</p>
                <?php endif; ?>

                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?><?php echo $selectedCategory ? '&category=' . $selectedCategory : ''; ?>">Précédent</a>
                    <?php endif; ?>
                    <span>Page <?php echo $page; ?> sur <?php echo $totalPages; ?></span>
                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?><?php echo $selectedCategory ? '&category=' . $selectedCategory : ''; ?>">Suivant</a>
                    <?php endif; ?>
                </div>
            </section>

            <aside class="sidebar">
                <h3>Publicités</h3>
                <div class="ad">
                    <a href="https://example.com" target="_blank">
                        <img src="../images/pub1.jpg" alt="Publicité verticale">
                    </a>
                </div>
                <div class="ad">
                    <a href="https://example.com" target="_blank">
                        <img src="../images/pub2.jpg" alt="Publicité carrée">
                    </a>
                </div>
                <div class="ad">
                    <a href="https://example.com" target="_blank">
                        <img src="../images/pub3.jpg" alt="Publicité rond">
                    </a>
                </div>
            </aside>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>