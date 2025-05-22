<?php
require_once __DIR__ . '/../config/db_connect.php';
require_once __DIR__ . '/../utils/functions.php';
require_once __DIR__ . '/../models/Category.php';

$categoryModel = new Category();
$categories = $categoryModel->getAllCategories();
?>

<header class="site-header">
    <div class="header-main">
        <div class="logo">
            <a href="/mglsi_news/index.php">
                <h1>MGLSI News</h1>
            </a>
        </div>
        
        <div class="header-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-menu">
                    <span class="user-greeting">Bienvenue, <?php echo safeHtml($_SESSION['user_name']); ?></span>
                    <div class="user-actions">
                        <a href="/mglsi_news/admin/dashboard.php" class="btn btn-primary">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Tableau de bord</span>
                        </a>
                        <a href="/mglsi_news/logout.php" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <a href="/mglsi_news/login.php" class="btn btn-primary">
                    <i class="fas fa-user"></i>
                    <span>Connexion Journaliste</span>
                </a>
            <?php endif; ?>
        </div>
    </div>

    <nav class="main-nav">
        <ul>
            <li><a href="/mglsi_news/index.php" class="nav-item active">
                <i class="fas fa-home"></i>
                <span>Accueil</span>
            </a></li>
            <?php foreach ($categories as $cat): ?>
                <li><a href="/mglsi_news/index.php?category=<?php echo safeHtml($cat['id']); ?>" class="nav-item">
                    <span><?php echo safeHtml($cat['libelle']); ?></span>
                </a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="/mglsi_news/css/header.css">
<link rel="stylesheet" href="/mglsi_news/css/main.css">