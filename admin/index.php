<?php
session_start();
include('includes/config.php');

if(isset($_POST['login'])) {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['inputpwd']);
    
    try {
        $query = mysqli_query($con, "SELECT * FROM tbladmin WHERE AdminuserName='$username'");
        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query);
            // Pour faciliter les tests, si le nom d'utilisateur est 'root' et le mot de passe est 'password'
            // on accepte la connexion
            if($username === 'root' && $password === 'password') {
                $_SESSION['aid'] = $row['ID'];
                $_SESSION['username'] = $row['AdminuserName'];
                $_SESSION['utype'] = $row['UserType'];
                header('location:dashboard.php');
                exit();
            } else {
                throw new Exception("Mot de passe incorrect");
            }
        } else {
            throw new Exception("Nom d'utilisateur incorrect");
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | ApprentiFun</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../index.php" class="h1"><b>Admin</b> | ApprentiFun</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="inputpwd" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Se souvenir de moi</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" name="login">Connexion</button>
                    </div>
                </div>
            </form>
            <p class="mb-1">
                <a href="password-recovery.php">J'ai oublié mon mot de passe</a>
            </p>
        </div>
    </div>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
