<?php include_once('includes/config.php');
 if(isset($_POST['submit'])){
$fname=$_POST['fathername'];
$mname=$_POST['mothername'];
$pmobno=$_POST['parentmobno'];
$pemail=$_POST['parentemail'];
$cname=$_POST['cname'];
$agegroup=$_POST['agegroup'];
$erollprogram=$_POST['erollprogram'];
$message=$_POST['message'];
$enrollno=mt_rand(100000000,999999999);


$query=mysqli_query($con,"insert into tblenrollment(enrollmentNumber,fatherName,motherName,parentmobNo,parentEmail,childName,childAge,enrollProgram,message) values('$enrollno','$fname','$mname','$pmobno','$pemail','$cname','$agegroup','$erollprogram','$message')");
if($query){
echo "<script>alert('Enrollment Details sent successfully.');</script>";
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
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
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
                <h1 class="display-2 text-white animated slideInDown mb-4">Child Enrollment</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Child Enrollment</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Appointment Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Start your Child's Early Education</h1>
                                <form method="post">
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="fathername" name="fathername" placeholder="Father Name" required>
                                                <label for="gname">Father Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="mothername" name="mothername" placeholder="Mother Name" required>
                                                <label for="gmail">Mother Email</label>
                                            </div>
                                        </div>

     <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="parentmobno" name="parentmobno" placeholder="Parents Mobile No." required>
                                                <label for="gname">Parents Mobile No.</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="parentemail" name="parentemail" placeholder="Parents Email" required>
                                                <label for="gmail">Parents Email</label>
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

 <div class="col-sm-12">
<div class="form-floating">
<select class="form-control" id="erollprogram" name="erollprogram"  required>

                        <option value="">Select a Program*</option>
                        <option value="PlayGroup-1.8 to 3 years">PlayGroup-1.8 to 3 years</option>
                        <option value="Nursery-2.5 to 4 years">Nursery-2.5 to 4 years</option>
                        <option value="Junior KG- 3.5 to 5 years">Junior KG-3.5 to 5 years</option>
                        <option value="Senior KG- 4.5 to 6 years">Senior KG- 4.5 to 6 years</option>
    
</select>
                                                <label for="cage">Program Enroll For</label>
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
</body>

</html>