<?php
// Routes de l'application
return [
    // Page d'accueil
    '/' => ['controller' => 'ArticleController', 'action' => 'index'],
    
    // Articles
    '/article/{id}' => ['controller' => 'ArticleController', 'action' => 'show'],
    
    // Administration
    '/admin/dashboard' => ['controller' => 'ArticleController', 'action' => 'dashboard'],
    '/admin/article/create' => ['controller' => 'ArticleController', 'action' => 'create'],
    '/admin/article/edit/{id}' => ['controller' => 'ArticleController', 'action' => 'edit'],
    '/admin/article/delete/{id}' => ['controller' => 'ArticleController', 'action' => 'delete'],
    
    // Authentification
    '/login' => ['controller' => 'AuthController', 'action' => 'login'],
    '/logout' => ['controller' => 'AuthController', 'action' => 'logout'],
]; 