<div class="app-footer app-player grey bg" id="footer-player" style="display:none;">
    <div class="playlist mep-tracks-count-3 has-artwork is-tracklist-closed" style="width:100%">
        <span class="mejs-offscreen">Audio Player</span>
        <div id="mep_0" class="mejs-container mejs-audio" tabindex="0" role="application" aria-label="Audio Player" style="width: 100%; height: 40px;">
            <div class="mejs-inner">
                <div class="mejs-mediaelement">
                    <audio id="audioPlayer" src=""></audio>
                </div>
                <div class="mejs-layers">
                    <a class="mejs-track-artwork" href="track.detail.html">
                        <img id="trackArtwork" src="images/default.jpg" alt="Track Artwork" style="width: 50px; height: 50px;" />
                    </a>
                    <div class="mejs-track-details">
                        <span class="mejs-track-title"><a id="trackTitle" href="track.detail.html">Track Title</a></span>
                        <span class="mejs-track-author"><a id="trackArtist" href="artist.detail.html">Artist Name</a></span>
                    </div>
                </div>
                <div class="mejs-controls">
                    <div class="mejs-button mejs-playpause-button mejs-pause">
                        <button type="button" class="btn-playpause text-primary m-r-sm" id="newPlayPauseButton" title="Play" aria-label="Play">Play</button>
                    </div>
                    <div class="mejs-time-rail" style="width: 100%;">
                        <span class="mejs-time-total mejs-time-slider" style="width: 100%;">
                            <span class="mejs-time-current" id="progressBar"></span>
                        </span>
                    </div>
                    <div class="mejs-time">
                        <span class="mejs-currenttime" id="currentTime">00:00</span>
                        <span class="mejs-time-separator"> / </span>
                        <span class="mejs-duration" id="duration">00:00</span>
                    </div>

                    <div class="mejs-button mejs-volume-button mejs-mute">
                        <button type="button" aria-controls="mep_0" title="Volume" aria-label="Volume" id="volumeButton" onclick="toggleVolumeBar()">
                            🔊
                        </button>
                        <input type="range" id="volumeControl" min="0" max="1" step="0.1" value="1" style="display:none;" onchange="changeVolume(this.value)" />
                    </div>
                </div>
                <div class="mejs-clear"></div>
            </div>
        </div>
    </div>
</div>

<script>
var audioPlayer = document.getElementById('audioPlayer');
var playPauseButton = document.getElementById('newPlayPauseButton');
var currentTimeDisplay = document.getElementById('currentTime');
var durationDisplay = document.getElementById('duration');
var progressBar = document.getElementById('progressBar');
var volumeControl = document.getElementById('volumeControl');
var trackArtwork = document.getElementById('trackArtwork');
var trackTitle = document.getElementById('trackTitle');
var trackArtist = document.getElementById('trackArtist');

function togglePlayPause() {
    if (audioPlayer.paused || audioPlayer.currentTime === 0) {
        audioPlayer.play();
        playPauseButton.innerHTML = 'Pause';
        playPauseButton.setAttribute('title', 'Pause');
        playPauseButton.setAttribute('aria-label', 'Pause');
    } else {
        audioPlayer.pause();
        playPauseButton.innerHTML = 'Play';
        playPauseButton.setAttribute('title', 'Play');
        playPauseButton.setAttribute('aria-label', 'Play');
    }
}

playPauseButton.addEventListener('click', togglePlayPause);

function toggleVolumeBar() {
    volumeControl.style.display = volumeControl.style.display === 'none' ? 'block' : 'none';
}

function changeVolume(volume) {
    audioPlayer.volume = volume;
}

audioPlayer.addEventListener('timeupdate', function() {
    var currentMinutes = Math.floor(audioPlayer.currentTime / 60);
    var currentSeconds = Math.floor(audioPlayer.currentTime - currentMinutes * 60);
    var durationMinutes = Math.floor(audioPlayer.duration / 60);
    var durationSeconds = Math.floor(audioPlayer.duration - durationMinutes * 60);

    if (currentSeconds < 10) currentSeconds = "0" + currentSeconds;
    if (durationSeconds < 10) durationSeconds = "0" + durationSeconds;

    currentTimeDisplay.innerHTML = currentMinutes + ":" + currentSeconds;
    durationDisplay.innerHTML = durationMinutes + ":" + durationSeconds;

    var progressPercent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
    progressBar.style.width = progressPercent + "%";
});

function playSong(audioPath, songName, artistName, imagePath) {
    audioPlayer.pause();

    console.log("Audio path: " + audioPath); 

    if (audioPlayer.src !== audioPath) {
        audioPlayer.src = audioPath;
    }

    audioPlayer.addEventListener('canplay', function() {
        audioPlayer.play();
    });

    audioPlayer.addEventListener('error', function(e) {
        console.error("Error loading audio: ", e);
    });

    trackTitle.innerHTML = songName;
    trackArtist.innerHTML = artistName;
    trackArtwork.src = imagePath ? imagePath : 'images/default.jpg';

    playPauseButton.innerHTML = 'Pause';
    playPauseButton.setAttribute('title', 'Pause');
    playPauseButton.setAttribute('aria-label', 'Pause');
    document.getElementById('footer-player').style.display = 'block';
}

audioPlayer.addEventListener('ended', function() {
    playPauseButton.innerHTML = 'Play';
    playPauseButton.setAttribute('title', 'Play');
    playPauseButton.setAttribute('aria-label', 'Play');
});
</script>
