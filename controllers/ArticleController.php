<?php
require_once __DIR__ . '/../models/Article.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../utils/functions.php';

class ArticleController {
    private $articleModel;
    private $categoryModel;

    public function __construct() {
        $this->articleModel = new Article();
        $this->categoryModel = new Category();
    }

    public function index() {
        session_start();
        $selectedCategory = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);
        $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
        $perPage = 10;

        $categories = $this->categoryModel->getAllCategories();
        $featured = $this->articleModel->getFeaturedArticle();
        $articles = $this->articleModel->getArticles($selectedCategory, $page, $perPage);
        $totalArticles = $this->articleModel->getTotalArticles($selectedCategory);
        $totalPages = ceil($totalArticles / $perPage);

        require_once __DIR__ . '/../views/index.view.php';
    }
}