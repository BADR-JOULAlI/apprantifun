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

<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100">
    <div class="position-relative top-50 start-50 translate-middle">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
</div>
<!-- Spinner End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom CSS for Gallery -->
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

<!-- Spinner Script -->
<script>
    // Fonction pour masquer le spinner
    function hideSpinner() {
        const spinner = document.getElementById('spinner');
        if (spinner) {
            spinner.style.opacity = '0';
            setTimeout(() => {
                spinner.style.display = 'none';
            }, 300);
        }
    }

    // Masquer le spinner quand le DOM est chargé
    document.addEventListener('DOMContentLoaded', hideSpinner);

    // Fallback pour le chargement lent
    window.addEventListener('load', hideSpinner);

    // Fallback supplémentaire avec un délai maximum
    setTimeout(hideSpinner, 5000); // Masquer après 5 secondes maximum

    // Fallback pour les navigateurs sans JavaScript
    <noscript>
        <style>
            #spinner {
                display: none !important;
            }
        </style>
    </noscript>
</script>
