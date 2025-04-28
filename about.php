<?php include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ApprentiFun Enrollment System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
 <?php include_once('includes/header.php');?>


        <!-- Page Header End -->
        <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">
                    <i class="fas fa-info-circle me-3"></i>About Us
                </h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-folder me-2"></i>Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><i class="fas fa-info-circle me-2"></i>About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <?php 
                        $sql=mysqli_query($con,"select * from tblpage where PageType='aboutus'");
                        while($data=mysqli_fetch_array($sql)){
                        ?>                 
                        <h1 class="section-title ff-secondary text-start text-primary fw-normal mb-4">
                            <i class="fas fa-school me-2"></i><?php echo $data['PageTitle']?>
                        </h1>
                        <div class="about-content">
                            <?php echo $data['PageDescription']?>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center">
                                <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/about-1.jpg" alt="Main School Image">
                            </div>
                            <div class="col-6 text-start" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-2.jpg" alt="Learning Activities">
                            </div>
                            <div class="col-6 text-end" style="margin-top: -150px;">
                                <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="Play Time">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->




        <!-- Team Start -->
        


        <!-- Footer Start -->
 <?php include_once('includes/footer.php');?> 
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

<style>
.about-content {
    line-height: 1.8;
    color: #666;
}

.about-content p {
    margin-bottom: 1.5rem;
}

.page-header {
    background: linear-gradient(rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), url(img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
}

.breadcrumb-item a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary);
}

.about-img img {
    transition: transform 0.3s ease;
}

.about-img img:hover {
    transform: scale(1.05);
}
</style>
</body>

</html>