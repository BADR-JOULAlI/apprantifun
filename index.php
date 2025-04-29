<?php include_once('includes/config.php');
 if(isset($_POST['submit'])){
$gname=$_POST['gname'];
$emailid=$_POST['emailid'];
$cname=$_POST['cname'];
$cage=$_POST['agegroup'];
$vtime=$_POST['visittime'];
$message=$_POST['message'];


$query=mysqli_query($con,"insert into tblvisitor(gurdianName,gurdianEmail,childName,childAge,message,visitTime) values('$gname','$emailid','$cname','$cage','$message','$vtime')");
if($query){
echo "<script>alert('Details sent successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}

 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ApprentiFun Enrollment System </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php include_once('includes/header.php');?>

        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">The Best Kindergarten School For Your Child</h1>
                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Make A Brighter Future For Your Child</h1>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


        <!-- Classes Start -->
        <section class="fun-activities my-5">
            <div class="container text-center">
                <h2 class="section-title ff-secondary text-center text-primary fw-normal">
                    <i class="fas fa-magic me-2"></i>Fun Activities
                </h2>
                <p class="text-muted mb-4">Discover creative and playful activities to spark your child's imagination!</p>
                
                <div class="row mt-4">
                    <div class="col-md-4 mb-4">
                        <a href="have-fun.php" class="text-decoration-none">
                            <div class="card h-100 p-4 activity-card">
                                <div class="activity-icon text-danger">
                                    <i class="fas fa-paint-brush fa-3x"></i>
                                </div>
                                <h5 class="card-title mt-4 text-dark">Coloring Time</h5>
                                <p class="card-text text-muted">Let kids explore their creativity with vibrant colors and cute drawings!</p>
                                <div class="mt-auto">
                                    <span class="text-danger explore-text">
                                        <i class="fas fa-arrow-right"></i> Start Creating
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="have-fun.php" class="text-decoration-none">
                            <div class="card h-100 p-4 activity-card">
                                <div class="activity-icon text-info">
                                    <i class="fas fa-music fa-3x"></i>
                                </div>
                                <h5 class="card-title mt-4 text-dark">Music & Rhymes</h5>
                                <p class="card-text text-muted">Sing, dance and have fun with catchy tunes and nursery rhymes!</p>
                                <div class="mt-auto">
                                    <span class="text-info explore-text">
                                        <i class="fas fa-arrow-right"></i> Start Playing
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-4">
                        <a href="have-fun.php" class="text-decoration-none">
                            <div class="card h-100 p-4 activity-card">
                                <div class="activity-icon text-success">
                                    <i class="fas fa-brain fa-3x"></i>
                                </div>
                                <h5 class="card-title mt-4 text-dark">Mini Challenges</h5>
                                <p class="card-text text-muted">Fun puzzles and brain teasers to help boost focus and logic skills.</p>
                                <div class="mt-auto">
                                    <span class="text-success explore-text">
                                        <i class="fas fa-arrow-right"></i> Start Playing
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <style>
        .activity-card {
            border-radius: 15px;
            transition: all 0.3s ease;
            border: none;
            overflow: hidden;
            background: #fff;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .activity-icon {
            background: rgba(0,0,0,0.03);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .activity-card:hover .activity-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .explore-text {
            font-size: 0.9rem;
            font-weight: 500;
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .activity-card:hover .explore-text {
            opacity: 1;
            transform: translateX(0);
        }

        .explore-text i {
            transition: transform 0.3s ease;
            display: inline-block;
            margin-right: 5px;
        }

        .activity-card:hover .explore-text i {
            transform: translateX(5px);
        }

        .section-title {
            margin-bottom: 1rem;
        }

        .section-title i {
            font-size: 2rem;
            margin-right: 0.5rem;
            vertical-align: middle;
        }
        </style>

        <!-- Animals Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="section-title ff-secondary text-center text-primary fw-normal">
                        <i class="fas fa-paw me-2"></i>Our Animal Friends
                    </h1>
                    <p class="text-muted mt-3">Meet the friendly animals that help our children learn about nature and develop empathy</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="animal-item">
                            <img class="img-fluid" src="img/animals/rabbit.jpg" alt="Rabbit">
                            <div class="text-center p-4">
                                <h5 class="mb-3">Bunny</h5>
                                <p>Our friendly rabbit who loves carrots and hopping around!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="animal-item">
                            <img class="img-fluid" src="img/animals/hamster.jpg" alt="Hamster">
                            <div class="text-center p-4">
                                <h5 class="mb-3">Hammy</h5>
                                <p>Our cute hamster who loves running in his wheel!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="animal-item">
                            <img class="img-fluid" src="img/animals/fish.jpg" alt="Fish">
                            <div class="text-center p-4">
                                <h5 class="mb-3">Goldie</h5>
                                <p>Our beautiful fish who swims gracefully in the aquarium!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Animals End -->


        <!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="section-title ff-secondary text-start text-primary fw-normal">
                                    <i class="far fa-calendar-check me-2"></i>Schedule a Visit
                                </h1>
                                <p class="text-muted mb-4">Come see our facilities and meet our dedicated team</p>
                                <form method="post">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="gname" name="gname" placeholder="Gurdian Name" required>
                                                <label for="gname">Gurdian Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="emailid" name="emailid" placeholder="Gurdian Email" required>
                                                <label for="gmail">Gurdian Email</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="cname" name="cname" placeholder="Child Name" required>
                                                <label for="cname">Child Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                         <select class="form-control" id="agegroup" name="agegroup"  required>
<option value="">Select</option>
<option value="18 Month-3 Year">18 Month-2 Year</option>
<option value="2-3 Year">2-3 Year</option>
<option value="3-4 Year">3-4 Year</option>
<option value="4-5 Year">4-5 Year</option>
<option value="5-6 Year">5-6 Year</option>
</select>
                                                <label for="cage">Child Age</label>
                                            </div>
                                        </div>


                      <div class="col-sm-6">
  <label for="cage">Visit Time</label>
                                        </div>                        

      <div class="col-sm-6">
                                            <div class="form-floating">
 <input type="datetime-local" id="visittime" name="visittime" required >
                                          
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px" name="message" required></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit" name="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->


        <!-- Team End -->


 

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">
                            <i class="fas fa-map-marker-alt me-2"></i>Contact Us
                        </h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="social-links d-flex pt-2">
                            <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-light me-1" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-square btn-outline-light" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">
                            <i class="fas fa-link me-2"></i>Quick Links
                        </h4>
                        <div class="d-flex flex-column">
                            <a class="btn btn-link py-2" href="about.php"><i class="fas fa-info-circle me-2"></i>About Us</a>
                            <a class="btn btn-link py-2" href="contact.php"><i class="fas fa-envelope me-2"></i>Contact Us</a>
                            <a class="btn btn-link py-2" href="have-fun.php"><i class="fas fa-smile me-2"></i>Have Fun</a>
                            <a class="btn btn-link py-2" href="enrollment.php"><i class="fas fa-user-plus me-2"></i>Enrollment</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">
                            <i class="fas fa-images me-2"></i>Photo Gallery
                        </h4>
                        <div class="row g-2 gallery-container">
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-1.jpg" alt="Creative Arts">
                                    <div class="gallery-caption">Creative Arts</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-2.jpg" alt="Learning Time">
                                    <div class="gallery-caption">Learning</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-3.jpg" alt="Group Activities">
                                    <div class="gallery-caption">Activities</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-4.jpg" alt="Story Time">
                                    <div class="gallery-caption">Story Time</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-5.jpg" alt="Outdoor Fun">
                                    <div class="gallery-caption">Outdoor</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="gallery-item">
                                    <img class="img-fluid rounded" src="img/classes-6.jpg" alt="Creative Play">
                                    <div class="gallery-caption">Play Time</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">
                            <i class="fas fa-clock me-2"></i>Opening Hours
                        </h4>
                        <div class="opening-hours">
                            <div class="d-flex justify-content-between mb-2">
                                <span><i class="far fa-calendar-alt me-2"></i>Monday - Friday</span>
                                <span>8:00 AM - 5:00 PM</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span><i class="far fa-calendar-alt me-2"></i>Saturday</span>
                                <span>9:00 AM - 12:00 PM</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span><i class="far fa-calendar-alt me-2"></i>Sunday</span>
                                <span class="text-primary">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">ApprentiFun</a>, All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

<style>
.opening-hours {
    background: rgba(255, 255, 255, 0.1);
    padding: 15px;
    border-radius: 8px;
}

.section-title i {
    font-size: 1.2rem;
}

.gallery-container {
    margin: 0 -5px;
}

.gallery-item {
    position: relative;
    margin-bottom: 10px;
    overflow: hidden;
    border-radius: 8px;
}

.gallery-item img {
    transition: transform 0.3s ease;
    border-radius: 8px;
}

.gallery-item:hover img {
    transform: scale(1.05);
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    text-align: center;
    padding: 5px;
    font-size: 12px;
    opacity: 0;
    transition: opacity 0.3s ease;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
}

.gallery-item:hover .gallery-caption {
    opacity: 1;
}

.social-links .btn {
    transition: all 0.3s ease;
}

.social-links .btn:hover {
    transform: translateY(-3px);
}

.btn-link {
    transition: all 0.3s ease;
    text-align: left;
}

.btn-link:hover {
    transform: translateX(5px);
}
</style>

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
</body>

</html>