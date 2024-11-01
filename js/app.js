document.addEventListener("DOMContentLoaded", () => {
    const playlistContainer = document.getElementById("playlist");

    // Appel à fetch_music.php pour récupérer la liste des fichiers audio
    fetch("fetch_music.php")
        .then(response => response.json())
        .then(data => {
            displayPlaylist(data);
        });

    function displayPlaylist(playlist) {
        playlistContainer.innerHTML = ""; // Effacer le contenu précédent

        playlist.forEach(track => {
            const trackElement = document.createElement("div");
            trackElement.className = "track";

            const title = document.createElement("h3");
            title.textContent = track.title;

            const audio = document.createElement("audio");
            audio.className = "player";
            audio.controls = true;

            const source = document.createElement("source");
            source.src = track.file;
            source.type = `audio/${track.file.split('.').pop()}`; // Utiliser l'extension pour le type MIME

            audio.appendChild(source);
            trackElement.appendChild(title);
            trackElement.appendChild(audio);
            playlistContainer.appendChild(trackElement);
        });
    }
});

