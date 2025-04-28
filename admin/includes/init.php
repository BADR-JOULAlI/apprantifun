<?php
// Inclusion des fichiers nécessaires
require_once('config.php');
require_once('session.php');

// Vérification de la session
if (!isLoggedIn()) {
    header('location:index.php');
    exit();
}

// Configuration des en-têtes de sécurité
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('X-Content-Type-Options: nosniff');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

// Fonction pour vérifier les permissions
function checkPermission($requiredType) {
    if ($requiredType == 'admin' && !isAdmin()) {
        header('location:dashboard.php');
        exit();
    }
    if ($requiredType == 'subadmin' && !isSubAdmin()) {
        header('location:dashboard.php');
        exit();
    }
}

// Fonction pour logger les actions
function logAction($action, $details = '') {
    global $con;
    $adminId = $_SESSION['aid'];
    $action = cleanInput($action);
    $details = cleanInput($details);
    $ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
    
    $query = "INSERT INTO tbladminlog (adminId, action, details, ipAddress, actionDate) 
              VALUES ('$adminId', '$action', '$details', '$ip', '$date')";
    mysqli_query($con, $query);
}

// Fonction pour gérer les uploads de fichiers
function handleFileUpload($file, $destination, $allowedTypes = ['jpg', 'jpeg', 'png']) {
    $fileName = $file['name'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    // Vérification du type de fichier
    if (!in_array($fileType, $allowedTypes)) {
        throw new Exception("Seuls les fichiers " . implode(', ', $allowedTypes) . " sont autorisés.");
    }
    
    // Génération d'un nom unique
    $newFileName = uniqid() . '.' . $fileType;
    $targetPath = $destination . $newFileName;
    
    // Upload du fichier
    if (!move_uploaded_file($file['tmp_name'], $targetPath)) {
        throw new Exception("Erreur lors de l'upload du fichier.");
    }
    
    return $newFileName;
}
?> 