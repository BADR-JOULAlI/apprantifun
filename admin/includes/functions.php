<?php
/**
 * Fonctions utilitaires pour ApprentiFun
 */

/**
 * Nettoie les données d'entrée pour prévenir les injections et les failles XSS
 * 
 * @param string $data Les données à nettoyer
 * @return string Les données nettoyées
 */
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Vérifie si une chaîne contient uniquement des caractères alphanumériques
 * 
 * @param string $string La chaîne à vérifier
 * @return bool True si la chaîne est alphanumérique, false sinon
 */
function isAlphanumeric($string) {
    return ctype_alnum($string);
}

/**
 * Valide une adresse email
 * 
 * @param string $email L'adresse email à valider
 * @return bool True si l'adresse email est valide, false sinon
 */
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Génère un jeton CSRF pour sécuriser les formulaires
 * 
 * @return string Le jeton CSRF
 */
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Vérifie si le jeton CSRF est valide
 * 
 * @param string $token Le jeton à vérifier
 * @return bool True si le jeton est valide, false sinon
 */
function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    return true;
}
?> 