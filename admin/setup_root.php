<?php
include('includes/config.php');

try {
    // Vérifier si l'utilisateur root existe déjà
    $check = mysqli_query($con, "SELECT ID FROM tbladmin WHERE AdminuserName='root'");
    
    if(mysqli_num_rows($check) == 0) {
        // Créer l'utilisateur root s'il n'existe pas
        $query = mysqli_query($con, "INSERT INTO tbladmin (AdminuserName, Password, UserType, AdminName, Email) 
                                   VALUES ('root', 'password', 1, 'Administrator', 'admin@local.com')");
        if($query) {
            echo "Utilisateur root créé avec succès!";
        } else {
            echo "Erreur lors de la création de l'utilisateur root: " . mysqli_error($con);
        }
    } else {
        // Mettre à jour le mot de passe si l'utilisateur existe
        $query = mysqli_query($con, "UPDATE tbladmin SET Password='password', UserType=1 WHERE AdminuserName='root'");
        if($query) {
            echo "Mot de passe de root mis à jour avec succès!";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe: " . mysqli_error($con);
        }
    }
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
?> 