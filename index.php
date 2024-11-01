<?php
// Configuration du chemin vers le dossier contenant la musique sur ton disque externe
$musicDir = 'ftpes://freebox@dog-man.freeboxos.fr:50046/galleriederecherche/MUSIC';

// Vérifier que le dossier existe
if (!is_dir($musicDir)) {
    die("Dossier introuvable");
}

// Obtenir les fichiers MP3 du dossier
$files = array_diff(scandir($musicDir), ['.', '..']);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecteur de musique privé</title>
</head>
<body>
    <h1>Lecteur de musique privé</h1>
    <ul>
        <?php foreach ($files as $file): ?>
            <?php if (pathinfo($file, PATHINFO_EXTENSION) === 'mp3'): ?>
                <li>
                    <a href="?file=<?= urlencode($file) ?>"><?= htmlspecialchars($file) ?></a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

    <?php if (isset($_GET['file'])): ?>
        <h2>Lecture de : <?= htmlspecialchars($_GET['file']) ?></h2>
        <audio controls>
            <source src="<?= $musicDir . '/' . $_GET['file'] ?>" type="audio/mp3">
            Votre navigateur ne supporte pas l'élément audio.
        </audio>
    <?php endif; ?>
</body>
</html>
