<?php
$directory = 'music/';
$files = array();

if (is_dir($directory)) {
    if ($dh = opendir($directory)) {
        while (($file = readdir($dh)) !== false) {
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

header('Content-Type: application/json');
echo json_encode($files);
?>
