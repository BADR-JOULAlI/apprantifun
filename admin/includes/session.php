<?php
session_start();
if(!isset($_SESSION['aid'])) {
    header('location:index.php');
    exit();
}

// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['aid']);
}

// Fonction pour vérifier le type d'utilisateur
function isAdmin() {
    return isset($_SESSION['utype']) && $_SESSION['utype'] == 1;
}

// Fonction pour vérifier si c'est un sous-admin
function isSubAdmin() {
    return isset($_SESSION['utype']) && $_SESSION['utype'] == 0;
}

// Fonction pour sécuriser les entrées
function sanitize($data) {
    global $con;
    return mysqli_real_escape_string($con, htmlspecialchars(trim($data)));
}

// Fonction pour afficher les messages d'erreur
function showError($message) {
    return '<div class="alert alert-danger">' . $message . '</div>';
}

// Fonction pour afficher les messages de succès
function showSuccess($message) {
    return '<div class="alert alert-success">' . $message . '</div>';
}
?> 