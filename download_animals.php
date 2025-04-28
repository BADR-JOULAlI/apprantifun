<?php
// Create directory if it doesn't exist
if (!file_exists('img/animals')) {
    mkdir('img/animals', 0777, true);
}

// Array of animal image URLs (using free stock photos)
$animals = [
    'rabbit' => 'https://images.pexels.com/photos/45842/bunny-rabbit-animal-cute-45842.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    'turtle' => 'https://images.pexels.com/photos/54081/turtle-tortoise-animal-reptile-54081.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    'fish' => 'https://images.pexels.com/photos/2156311/pexels-photo-2156311.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    'hamster' => 'https://images.pexels.com/photos/45201/kitty-cat-kitten-pet-45201.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
];

// Download each image
foreach ($animals as $name => $url) {
    $file = 'img/animals/' . $name . '.jpg';
    
    // Only download if file doesn't exist
    if (!file_exists($file)) {
        $image = file_get_contents($url);
        if ($image !== false) {
            file_put_contents($file, $image);
            echo "Downloaded $name image successfully.<br>";
        } else {
            echo "Failed to download $name image.<br>";
        }
    } else {
        echo "$name image already exists.<br>";
    }
}

echo "All done!";
?> 