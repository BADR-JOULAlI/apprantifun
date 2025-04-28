<?php
include('includes/config.php');

// Vérifier la connexion
if (mysqli_connect_errno()) {
    echo "Erreur de connexion à la base de données: " . mysqli_connect_error();
    exit();
}

// Vérifier si les tables existent
$tables = array('tbl_categories', 'tbl_learning_content');
foreach ($tables as $table) {
    $result = mysqli_query($con, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) == 0) {
        // La table n'existe pas, on la crée
        if ($table == 'tbl_categories') {
            $sql = "CREATE TABLE tbl_categories (
                id INT PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(100) NOT NULL,
                description TEXT,
                icon VARCHAR(50),
                status BOOLEAN DEFAULT TRUE
            )";
        } else {
            $sql = "CREATE TABLE tbl_learning_content (
                id INT PRIMARY KEY AUTO_INCREMENT,
                category_id INT,
                title VARCHAR(100) NOT NULL,
                description TEXT,
                image_path VARCHAR(255),
                type ENUM('image', 'video', 'audio'),
                status BOOLEAN DEFAULT TRUE,
                FOREIGN KEY (category_id) REFERENCES tbl_categories(id)
            )";
        }
        
        if (mysqli_query($con, $sql)) {
            echo "Table $table créée avec succès<br>";
        } else {
            echo "Erreur lors de la création de la table $table: " . mysqli_error($con) . "<br>";
        }
    } else {
        echo "La table $table existe déjà<br>";
    }
}

// Vérifier si les catégories existent
$result = mysqli_query($con, "SELECT COUNT(*) as count FROM tbl_categories");
$row = mysqli_fetch_assoc($result);
if ($row['count'] == 0) {
    // Ajouter les catégories de base
    $categories = array(
        array('Animals', 'Learn about different animals', 'fa-paw'),
        array('Transportation', 'Discover various vehicles', 'fa-car'),
        array('Music', 'Enjoy musical activities', 'fa-music')
    );
    
    foreach ($categories as $cat) {
        $sql = "INSERT INTO tbl_categories (name, description, icon) VALUES 
                ('" . $cat[0] . "', '" . $cat[1] . "', '" . $cat[2] . "')";
        if (mysqli_query($con, $sql)) {
            echo "Catégorie " . $cat[0] . " ajoutée<br>";
            
            // Récupérer l'ID de la catégorie
            $cat_id = mysqli_insert_id($con);
            
            // Ajouter du contenu pour cette catégorie
            if ($cat[0] == 'Animals') {
                $content = array(
                    array('Lion', 'The king of the jungle', 'img/classes-1.jpg'),
                    array('Elephant', 'The gentle giant', 'img/classes-2.jpg'),
                    array('Giraffe', 'The tallest animal', 'img/classes-3.jpg'),
                    array('Penguin', 'The cute swimmer', 'img/classes-4.jpg')
                );
            } elseif ($cat[0] == 'Transportation') {
                $content = array(
                    array('Car', 'Four wheels on the road', 'img/classes-5.jpg'),
                    array('Train', 'Choo choo! All aboard!', 'img/classes-6.jpg'),
                    array('Airplane', 'Flying high in the sky', 'img/carousel-1.jpg')
                );
            } else {
                $content = array(
                    array('Sing Along', 'Fun songs for kids', null),
                    array('Rhythm Games', 'Learn about rhythm', null),
                    array('Instrument Sounds', 'Discover instruments', null)
                );
            }
            
            foreach ($content as $item) {
                $sql = "INSERT INTO tbl_learning_content (category_id, title, description, image_path, type) VALUES 
                        ($cat_id, '" . $item[0] . "', '" . $item[1] . "', " . 
                        ($item[2] ? "'" . $item[2] . "'" : "NULL") . ", 'image')";
                if (mysqli_query($con, $sql)) {
                    echo "Contenu " . $item[0] . " ajouté<br>";
                } else {
                    echo "Erreur lors de l'ajout du contenu " . $item[0] . ": " . mysqli_error($con) . "<br>";
                }
            }
        } else {
            echo "Erreur lors de l'ajout de la catégorie " . $cat[0] . ": " . mysqli_error($con) . "<br>";
        }
    }
} else {
    echo "Les catégories existent déjà<br>";
}

// Afficher le contenu des tables
echo "<h2>Contenu de la table tbl_categories:</h2>";
$result = mysqli_query($con, "SELECT * FROM tbl_categories");
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . ", Nom: " . $row['name'] . ", Icon: " . $row['icon'] . "<br>";
}

echo "<h2>Contenu de la table tbl_learning_content:</h2>";
$result = mysqli_query($con, "SELECT * FROM tbl_learning_content");
while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row['id'] . ", Catégorie: " . $row['category_id'] . ", Titre: " . $row['title'] . "<br>";
}
?> 