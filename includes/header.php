<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ApprentiFun</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/nature-theme.css" rel="stylesheet">

    <div class="container-xxl p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-leaf me-3"></i>ApprentiFun</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="have-fun.php" class="nav-item nav-link">Have Fun</a>
                    <a href="admin" class="nav-item nav-link">Admin</a>
                </div>
                <a href="visit.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Schedule a Visit<i class="fa fa-arrow-right ms-3"></i></a>
                &nbsp;&nbsp;
                <a href="enrollment.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Enroll Now<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <script>
    window.addEventListener('load', function () {
        const spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.classList.remove('show'); // enlève la classe "show"
            spinner.style.display = 'none';   // cache le spinner complètement
        }
    });
</script>

        <!-- Navbar End -->
