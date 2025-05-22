<?php
require_once __DIR__ . '/../Core/Controller.php';

class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // TODO: Implémenter la logique d'authentification
            // Pour l'instant, rediriger vers le tableau de bord
            header('Location: ' . BASE_URL . '/admin/dashboard');
            exit;
        }

        // Afficher le formulaire de connexion
        $this->render('login');
    }

    public function logout() {
        // Détruire la session
        session_start();
        session_destroy();
        
        // Rediriger vers la page d'accueil
        header('Location: ' . BASE_URL . '/');
        exit;
    }
} 