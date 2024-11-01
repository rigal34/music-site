<?php
// Chemin vers ton dossier de musique
$directory = '/9 To/dev/www/galleriederecherche/MUSIC';

if (is_dir($directory)) {
    $files = scandir($directory);

    echo "<h1>Ma musique</h1><ul>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<li><a href='$directory/$file'>$file</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Le dossier de musique est introuvable.";
}
?>

