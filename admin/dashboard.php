<?php
session_start();
require_once '../config/db_connect.php';
require_once '../utils/functions.php';

// Vérifie si l'utilisateur est connecté
// Si non, redirige vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}

// Connexion à la base de données et récupération des articles
// On récupère aussi les informations de catégorie et d'auteur pour l'affichage
$pdo = getDatabaseConnection();
$articles = $pdo->query('SELECT a.*, c.libelle as categorie_nom, u.nom as auteur_nom 
                        FROM Article a 
                        LEFT JOIN Categorie c ON a.categorie = c.id 
                        LEFT JOIN Utilisateur u ON a.auteur = u.id 
                        ORDER BY a.dateCreation DESC')->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - MGLSI News</title>
    <link rel="stylesheet" href="/mglsi_news/css/style.css">
    <link rel="stylesheet" href="/mglsi_news/css/dashboard.css">
    <!-- Intégration de Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <main class="container">
        <div class="dashboard-container">
            <!-- En-tête avec titre et bouton d'ajout -->
            <div class="dashboard-header">
                <h1>Tableau de bord</h1>
                <a href="add_article.php" class="add-article-btn">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un article</span>
                </a>
            </div>

            <!-- Tableau des articles avec gestion du défilement horizontal -->
            <div class="table-responsive">
                <table class="articles-table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Auteur</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo safeHtml($article['titre']); ?></td>
                            <td><?php echo safeHtml($article['categorie_nom']); ?></td>
                            <td><?php echo safeHtml($article['auteur_nom']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($article['dateCreation'])); ?></td>
                            <td>
                                <div class="action-buttons">
                                    <!-- Bouton de modification -->
                                    <a href="edit_article.php?id=<?php echo $article['id']; ?>" class="action-btn edit-btn">
                                        <i class="fas fa-edit"></i>
                                        <span>Modifier</span>
                                    </a>
                                    <!-- Bouton de suppression avec confirmation -->
                                    <a href="delete_article.php?id=<?php echo $article['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                        <i class="fas fa-trash"></i>
                                        <span>Supprimer</span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html> 