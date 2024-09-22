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
							</div>
							<?php include('cards.php'); ?>
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
		<?php include 'search.php';?>
		
	</div>
	<script src="scripts/app.min.js">
	</script>
</body>
</html>