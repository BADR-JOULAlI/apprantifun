<?php
// Configuration de la zone horaire
date_default_timezone_set('Asia/Kolkata');

// Configuration de la base de données
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'apprentifundb');

// Connexion à la base de données avec gestion d'erreurs améliorée
try {
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        throw new Exception("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }
    mysqli_set_charset($con, "utf8");
} catch (Exception $e) {
    error_log($e->getMessage());
    die("Une erreur est survenue. Veuillez réessayer plus tard.");
}

// Fonction pour nettoyer les entrées
function cleanInput($data) {
    global $con;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($con, $data);
}
?>
