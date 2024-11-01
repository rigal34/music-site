const players = Plyr.setup('.player', { 
    controls: ['play', 'progress', 'volume', 'download'],
    i18n: {
        restart: 'Redémarrer',
        rewind: 'Reculer {seektime}s',
        play: 'Lire',
        pause: 'Pause',
        fastForward: 'Avancer {seektime}s',
        mute: 'Muet',
        unmute: 'Son activé',
        volume: 'Volume',
        download: 'Télécharger',
        settings: 'Paramètres',
        fullscreen: 'Plein écran'
    }
});

