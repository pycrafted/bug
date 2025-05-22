<?php
class Controller {
    protected function render($view, $data = []) {
        // Extraire les données pour les rendre disponibles dans la vue
        extract($data);
        
        // Construire le chemin vers la vue
        $viewPath = __DIR__ . '/../Views/' . $view . '.view.php';
        
        // Vérifier si la vue existe
        if (!file_exists($viewPath)) {
            throw new Exception("Vue non trouvée : {$view}");
        }
        
        // Démarrer la mise en tampon de sortie
        ob_start();
        
        // Inclure la vue
        require $viewPath;
        
        // Récupérer le contenu du tampon et le vider
        $content = ob_get_clean();
        
        // Afficher le contenu
        echo $content;
    }
} 