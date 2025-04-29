<?php
// --- Début du débogage ---
ini_set('display_errors', 1); // Afficher les erreurs PHP
ini_set('display_startup_errors', 1); // Afficher les erreurs de démarrage
error_reporting(E_ALL); // Reporter toutes les erreurs PHP
// --- Fin du débogage ---

include('includes/config.php');

// Vérification de la connexion à la base de données (déjà présente dans config.php mais une vérification ici est utile)
if (!$con) {
    die("Erreur critique : Impossible de se connecter à la base de données dans have-fun.php. Détails : " . mysqli_connect_error());
}

// Récupérer les catégories
$categories_query = "SELECT * FROM tbl_categories WHERE status = TRUE";
$categories_result = mysqli_query($con, $categories_query);
// Vérification de la requête SQL
if (!$categories_result) {
    // Affiche l'erreur SQL et la requête qui a échoué
    die("Erreur SQL lors de la récupération des catégories : " . mysqli_error($con) . "<br>Requête : " . $categories_query);
}

// Récupérer les contenus d'apprentissage
$content_query = "SELECT c.*, cat.name as category_name 
                 FROM tbl_learning_content c 
                 JOIN tbl_categories cat ON c.category_id = cat.id 
                 WHERE c.status = TRUE";
$content_result = mysqli_query($con, $content_query);
// Vérification de la requête SQL
if (!$content_result) {
    // Affiche l'erreur SQL et la requête qui a échoué
    die("Erreur SQL lors de la récupération des contenus : " . mysqli_error($con) . "<br>Requête : " . $content_query);
}

// Récupérer les chansons depuis la table tbl_songs
$songs_query = "SELECT * FROM tbl_songs WHERE status = 1 ORDER BY id ASC";
$songs_result = mysqli_query($con, $songs_query);

// Vérification de la requête SQL
if (!$songs_result) {
    die("Erreur SQL lors de la récupération des chansons : " . mysqli_error($con) . "<br>Requête : " . $songs_query);
}

// Organiser les contenus par catégorie
$contents = array();
// Vérifier si $content_result contient des lignes avant de boucler (évite une erreur si la table est vide)
if (mysqli_num_rows($content_result) > 0) {
    while($row = mysqli_fetch_assoc($content_result)) {
        // Assurer que l'index existe avant d'ajouter
        if (!isset($contents[$row['category_id']])) {
            $contents[$row['category_id']] = [];
        }
        $contents[$row['category_id']][] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Have Fun - ApprentiFun</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #88B04B; /* Green Leaf */
            --secondary-color: #F4A261; /* Earthy Orange */
            --accent-color: #2A9D8F; /* Deep Teal */
            --bg-color: #F0F5EF; /* Light Nature Background */
            --text-color: #2C3E50;
            --button-gradient: linear-gradient(to right, #88B04B, #2A9D8F);
            --border-radius: 12px;
            --box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            --transition: all 0.3s ease-in-out;
        }

        body {
            font-family: 'Quicksand', sans-serif;
            color: var(--text-color);
            background-color: var(--bg-color);
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path fill="%23E8F5E9" d="M0,0 L100,0 L100,100 L0,100 Z"/><path fill="%23C8E6C9" d="M0,0 L50,0 L50,50 L0,50 Z"/></svg>');
            background-repeat: repeat;
        }

        .container-xxl {
            background-color: white;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .page-header {
            background: linear-gradient(rgba(136, 176, 75, 0.7), rgba(42, 157, 143, 0.7)), url('img/carousel-1.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
        }

        /* Category Card Styles */
        .category-item {
            transition: var(--transition);
            border: 1px solid rgba(136, 176, 75, 0.2);
            border-radius: var(--border-radius);
            background-color: white;
            overflow: hidden;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 2rem;
            box-shadow: var(--box-shadow);
        }

        .category-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--button-gradient);
        }

        .category-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .category-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            transition: var(--transition);
        }

        .category-item:hover .category-icon {
            transform: scale(1.1);
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .category-description {
            color: #666;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        /* Gallery Item Styles */
        .gallery-item {
            margin-bottom: 30px;
            border: 1px solid rgba(136, 176, 75, 0.2);
            border-radius: var(--border-radius);
            background-color: white;
            transition: var(--transition);
            overflow: hidden;
            height: 100%;
            box-shadow: var(--box-shadow);
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .gallery-img-container {
            position: relative;
            overflow: hidden;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            height: 220px;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.05);
        }

        .gallery-content {
            padding: 1.5rem;
        }

        .gallery-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--text-color);
        }

        .gallery-description {
            color: #666;
            margin-bottom: 1.25rem;
        }

        .text-primary { 
            color: var(--primary-color) !important; 
        }

        .btn-primary { 
            background: var(--button-gradient);
            border: none;
            border-radius: var(--border-radius);
            color: white;
            padding: 10px 20px;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #2A9D8F, #88B04B);
            opacity: 0;
            z-index: -1;
            transition: var(--transition);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(42, 157, 143, 0.3);
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            color: var(--text-color);
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--button-gradient);
            border-radius: 3px;
        }

        /* Animation pour les éléments */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .category-item, .gallery-item {
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .category-item:nth-child(2) {
            animation-delay: 0.1s;
        }

        .category-item:nth-child(3) {
            animation-delay: 0.2s;
        }

        /* Styles pour les icônes */
        .fa, .bi {
            color: var(--primary-color);
        }

        /* Styles pour le breadcrumb */
        .breadcrumb-item a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb-item a:hover {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Styles pour les sections de contenu */
        .content-section {
            position: relative;
            padding: 60px 0;
        }

        .content-section:nth-child(even) {
            background-color: rgba(240, 245, 239, 0.5);
        }

        /* Spinner Styles */
        #spinner {
            transition: opacity 0.3s ease-in-out;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        /* Songs Gallery Styles */
        .songs-gallery {
            padding: 4rem 0;
            background-color: var(--bg-color);
        }

        .song-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            height: 100%;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .song-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .song-image-container {
            position: relative;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio */
            overflow: hidden;
        }

        .song-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .song-card:hover .song-image {
            transform: scale(1.05);
        }

        .song-content {
            padding: 1.5rem;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .song-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .song-description {
            color: #666;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .audio-player-container {
            margin-top: auto;
            padding: 0 1.5rem 1.5rem;
        }

        .audio-player {
            width: 100%;
            height: 40px;
            border-radius: 20px;
            background: var(--bg-color);
            outline: none;
        }

        .audio-player::-webkit-media-controls-panel {
            background-color: var(--bg-color);
            border-radius: 20px;
        }

        .audio-player::-webkit-media-controls-play-button,
        .audio-player::-webkit-media-controls-mute-button {
            color: var(--primary-color);
        }

        .audio-player::-webkit-media-controls-current-time-display,
        .audio-player::-webkit-media-controls-time-remaining-display {
            color: var(--text-color);
        }

        .audio-player::-webkit-media-controls-timeline {
            background-color: var(--primary-color);
            border-radius: 10px;
            height: 4px;
        }

        @media (max-width: 768px) {
            .song-card {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-xxl p-0">
        <?php 
        // --- Débogage des inclusions ---
        // Utilisation de @ pour supprimer l'avertissement par défaut et gérer l'erreur nous-mêmes
        if (@!include('includes/header.php')) {
            die("Erreur critique : Impossible d'inclure includes/header.php. Vérifiez le chemin et les permissions.");
        }
        // --- Fin débogage inclusions ---
        ?>

        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container py-5">
                <h1 class="display-5 text-white mb-3">Have Fun</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Have Fun</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

        <!-- Categories Section Start -->
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="section-title mb-3">Categories</h1>
                <p>Explore our fun learning categories</p>
            </div>
            <div class="row g-4">
                <?php 
                // Vérifier si $categories_result contient des lignes avant de boucler
                if (mysqli_num_rows($categories_result) > 0) {
                    // Boucler sur les catégories
                    while($category = mysqli_fetch_assoc($categories_result)) { 
                ?>
                    <div class="col-md-4">
                        <div class="category-item text-center">
                            <!-- Utilisation de htmlspecialchars pour prévenir les failles XSS -->
                            <div>
                                <i class="fa <?php echo htmlspecialchars($category['icon'] ?? 'fa-question-circle'); ?> category-icon"></i>
                                <h4 class="category-title"><?php echo htmlspecialchars($category['name'] ?? 'N/A'); ?></h4>
                                <p class="category-description"><?php echo htmlspecialchars($category['description'] ?? ''); ?></p>
                            </div>
                            <!-- Assurer que le nom de catégorie est valide pour un ID/lien -->
                            <a href="#cat-<?php echo filter_var(strtolower($category['name'] ?? ''), FILTER_SANITIZE_URL); ?>" class="btn btn-primary">
                                <i class="fa fa-leaf me-2"></i>View <?php echo htmlspecialchars($category['name'] ?? 'N/A'); ?>
                            </a>
                        </div>
                    </div>
                <?php 
                    } // Fin while categories
                } else {
                    // Afficher un message si aucune catégorie n'est trouvée
                    echo "<p class='text-center col-12'>Aucune catégorie trouvée.</p>";
                }
                ?>
            </div>
        </div>
        <!-- Categories Section End -->

        <!-- Games Gallery Section Start -->
        <div class="container py-5" id="games">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="section-title mb-3">Games Gallery</h1>
                <p>Discover amazing educational games to learn while having fun!</p>
            </div>
            <div class="row g-4">
                <!-- Memory Game -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/games/memory.png" class="card-img-top" alt="Memory Game">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Memory Game</h5>
                            <p class="gallery-description">Train your memory by matching pairs of cards.</p>
                            <a href="games/memory.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-gamepad me-2"></i>Play Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Maze Game -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/games/maze for children.jpg" class="card-img-top" alt="Maze Game">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Maze Adventure</h5>
                            <p class="gallery-description">Help the character find their way through fun mazes.</p>
                            <a href="games/maze.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-gamepad me-2"></i>Play Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Puzzle Game -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/games/puzzle.png" class="card-img-top" alt="Puzzle Game">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Fun Puzzles</h5>
                            <p class="gallery-description">Solve colorful puzzles and improve your logic skills.</p>
                            <a href="games/puzzle.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-gamepad me-2"></i>Play Now
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Counting with Apples -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/games/apples.png" class="card-img-top" alt="Counting with Apples">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Counting with Apples</h5>
                            <p class="gallery-description">Learn basic math with fun apple counting exercises.</p>
                            <a href="games/apples.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-gamepad me-2"></i>Play Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Games Gallery Section End -->

        <!-- Stories Gallery Section Start -->
        <div class="container py-5" id="stories">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="section-title mb-3">Stories Gallery</h1>
                <p>Discover our collection of engaging stories</p>
            </div>
            <div class="row g-4">
                <!-- The Lion and the Mouse -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/stories/storie1.png" class="card-img-top" alt="The Lion and the Mouse">
                        <div class="gallery-content">
                            <h5 class="gallery-title">The Lion and the Mouse</h5>
                            <p class="gallery-description">A classic tale of friendship and kindness.</p>
                            <a href="stories/lion-mouse.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-book me-2"></i>Read Story
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- The Brave Little Turtle -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/stories/storie2.jpg" class="card-img-top" alt="The Brave Little Turtle">
                        <div class="gallery-content">
                            <h5 class="gallery-title">The Brave Little Turtle</h5>
                            <p class="gallery-description">An adventure of courage and determination.</p>
                            <a href="stories/brave-turtle.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-book me-2"></i>Read Story
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Rainbow in the Sky -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/stories/storie3.png" class="card-img-top" alt="Rainbow in the Sky">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Rainbow in the Sky</h5>
                            <p class="gallery-description">A colorful journey through nature's wonders.</p>
                            <a href="stories/rainbow.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-book me-2"></i>Read Story
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Bedtime Stories -->
                <div class="col-md-6 col-lg-3">
                    <div class="gallery-item">
                        <img src="img/stories/storie4.jpg" class="card-img-top" alt="Bedtime Stories">
                        <div class="gallery-content">
                            <h5 class="gallery-title">Bedtime Stories</h5>
                            <p class="gallery-description">A magical collection of bedtime tales.</p>
                            <a href="stories/bedtime.html" class="btn btn-primary btn-sm">
                                <i class="fa fa-book me-2"></i>Read Story
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stories Gallery Section End -->

        <!-- Songs Gallery Section -->
        
        </div>

        <!-- Content Sections -->
        <?php 
        // Reset categories result for reuse - Seulement si on a des catégories
        if (mysqli_num_rows($categories_result) > 0) {
            mysqli_data_seek($categories_result, 0); // Remettre le pointeur au début
            while($category = mysqli_fetch_assoc($categories_result)) { 
                $category_id = $category['id'];
                // Vérifier si des contenus existent pour cette catégorie et que ce n'est pas la catégorie Stories ou Games
                if(isset($contents[$category_id]) && count($contents[$category_id]) > 0 && 
                   strtolower($category['name']) !== 'stories' && 
                   strtolower($category['name']) !== 'games') {
            ?>
                <!-- Section pour chaque catégorie -->
                <div id="cat-<?php echo filter_var(strtolower($category['name'] ?? ''), FILTER_SANITIZE_URL); ?>" class="content-section">
                    <div class="container py-5">
                        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                            <h1 class="section-title mb-3"><?php echo htmlspecialchars($category['name'] ?? 'N/A'); ?> Gallery</h1>
                            <p>Discover amazing <?php echo strtolower(htmlspecialchars($category['name'] ?? 'items')); ?></p>
                        </div>
                        <div class="row g-4">
                            <?php foreach($contents[$category_id] as $item) { ?>
                                <div class="col-md-6">
                                    <div class="gallery-item">
                                        <?php if(isset($item['type']) && $item['type'] == 'image' && isset($item['image_path'])) { ?>
                                            <div class="gallery-img-container">
                                                <img class="gallery-img" src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? ''); ?>">
                                            </div>
                                        <?php } ?>
                                        <div class="gallery-content">
                                            <h5 class="gallery-title"><?php echo htmlspecialchars($item['title'] ?? 'N/A'); ?></h5>
                                            <p class="gallery-description"><?php echo htmlspecialchars($item['description'] ?? ''); ?></p>
                                            <a href="#" class="btn btn-primary btn-sm">
                                                <i class="fa fa-info-circle me-2"></i>Learn More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php 
                }
            }
        }
        ?>

        <!-- Footer Start -->
        <?php 
        // --- Débogage des inclusions ---
        if (@!include('includes/footer.php')) {
            die("Erreur critique : Impossible d'inclure includes/footer.php. Vérifiez le chemin et les permissions.");
        }
        // --- Fin débogage inclusions ---
        ?>
        <!-- Footer End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                try {
                    // S'assurer que l'élément cible existe
                    const targetElement = document.querySelector(this.getAttribute('href'));
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        console.warn("Element cible pour le défilement introuvable : ", this.getAttribute('href'));
                    }
                } catch (error) {
                    console.error("Erreur lors du défilement : ", error);
                }
            });
        });

        // Animation au défilement
        document.addEventListener('DOMContentLoaded', function() {
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.category-item, .gallery-item');
                
                elements.forEach(element => {
                    const elementPosition = element.getBoundingClientRect().top;
                    const windowHeight = window.innerHeight;
                    
                    if (elementPosition < windowHeight - 50) {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }
                });
            };
            
            // Initial call
            animateOnScroll();
            
            // Call on scroll
            window.addEventListener('scroll', animateOnScroll);
        });
        
        // Spinner handling
        document.addEventListener('DOMContentLoaded', function() {
            // Hide spinner when DOM is fully loaded
            const spinner = document.getElementById('spinner');
            if (spinner) {
                spinner.style.opacity = '0';
                setTimeout(() => {
                    spinner.style.display = 'none';
                }, 300);
            }
        });
        
        // Fallback for slow loading
        window.addEventListener('load', function() {
            const spinner = document.getElementById('spinner');
            if (spinner) {
                spinner.style.opacity = '0';
                setTimeout(() => {
                    spinner.style.display = 'none';
                }, 300);
            }
        });
    </script>
</body>
</html> 