document.addEventListener("DOMContentLoaded", () => {
    const playlistContainer = document.getElementById("playlist");

    // Récupérer la liste des fichiers via le PHP
    fetch("fetch_music.php")
        .then(response => response.json())
        .then(data => {
            displayPlaylist(data);
        });

    function displayPlaylist(playlist) {
        playlistContainer.innerHTML = "";

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
            source.type = `audio/${track.file.split('.').pop()}`;

            audio.appendChild(source);
            trackElement.appendChild(title);
            trackElement.appendChild(audio);
            playlistContainer.appendChild(trackElement);
        });
    }
});

