<?php
include('usercheck.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('header.php'); ?>
</head>

<body>
	<div class="app dk" id="app">
		<?php include('sidebar.php'); ?>
		<div id="content" class="app-content white bg box-shadow-z2" role="main">
			<div class="app-header hidden-lg-up white lt box-shadow-z1">
			</div>
			<?php include('footer.php');?>
			<div class="app-body" id="view">
				<div class="page-content">
					<div class="padding p-b-0">
						<div class="page-title m-b">
							<h1 class="inline m-a-0">
								Discover</h1>
						</div>
						<div class="row row-sm item-masonry item-info-overlay">
							<?php include('slider.php'); ?>
							<?php include('cards.php'); ?>
							</div>
							
					</div>
					<div class="row-col">
						<div class="col-lg-9 b-r no-border-md">
							<div class="padding">
								<h2 class="widget-title h4 m-b">
									Treading</h2>
								<div class="owl-carousel owl-theme owl-dots-center" data-ui-jp="owlCarousel"
									data-ui-options="{
					margin: 20,
					responsiveClass:true,
				    responsive:{
				    	0:{
				    		items: 2
				    	},
				        543:{
				            items: 3
				        }
				    }
				}">
									<?php include 'trending.php';?>
								</div>
								<h2 class="widget-title h4 m-b">
									New</h2>
								<div class="row">
									<?php include 'new.php';?>
								</div>
								<h2 class="widget-title h4 m-b">
									Recommand for you</h2>
								<div class="row item-list item-list-md m-b">
									<?php include 'recommand.php';?>
								</div>
							</div>
						</div>
						<?php include ('likes.php');?>
					</div>
				</div>
			</div>
		</div>
		<?php include 'switcher.php';?>
	</div>
	<script src="scripts/app.min.js">
	</script>
<script>
    let audioPlayer = new Audio(); // Create a new Audio object
    let currentSong = ''; // Keep track of the current song

    function playSong(audioPath, songName, artistName, imagePath) {
        // If a song is already playing, pause it
        if (currentSong !== audioPath) {
            audioPlayer.pause(); // Pause the currently playing audio
            audioPlayer.src = audioPath; // Set the new audio source
            audioPlayer.play(); // Play the new audio
            currentSong = audioPath; // Update the current song variable

            // Update the footer or UI elements with the new song info
            document.querySelector('.mejs-track-title a').innerHTML = songName;
            document.querySelector('.mejs-track-author a').innerHTML = artistName;
            document.querySelector('.mejs-track-artwork').style.backgroundImage = 'url(' + imagePath + ')';
        } else {
            // If the same song is clicked again, toggle pause
            audioPlayer.paused ? audioPlayer.play() : audioPlayer.pause();
        }
    }
</script>

</body>
</html>
