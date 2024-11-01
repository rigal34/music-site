<?php
$directory = 'music/'; // Dossier contenant les fichiers audio
$files = array();

// Vérifier que le dossier existe et le parcourir
if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
            // Filtrer les fichiers audio (formats MP3, FLAC, WAV)
            if (preg_match('/\.(mp3|flac|wav)$/i', $file)) {
                $files[] = array(
                    "title" => pathinfo($file, PATHINFO_FILENAME),
                    "file" => $directory . $file
                );
            }
        }
        closedir($dh);
    }
}

// Envoyer la réponse en JSON
header('Content-Type: application/json');
echo json_encode($files);
?>

