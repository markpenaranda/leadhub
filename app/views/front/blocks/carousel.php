<script type="text/javascript" src="/assets/scripts/jquery.waterwheelCarousel.js"></script>
<style type="text/css">
	.carousel { background-color: #F8F8F8; padding-top:30px; position: relative;}

	.carousel .carousel-nav { position: absolute; cursor: pointer; top:45%; width: 34px; height: 55px; background-image: url('/assets/images/arrows.png'); background-repeat: no-repeat; }
	.carousel .carousel-prev {  left:-34px; }
	.carousel .carousel-prev:hover {  background-position: 0px -61px; }
	.carousel .carousel-next {  right:-34px; background-position: -30px 0px; }
	.carousel .carousel-next:hover {  background-position: -30px -61px; }

	.carousel #carousel { width:100%; height: 300px; display: relative; text-align: center; }
	.carousel #carousel img { cursor: pointer; }
</style>
<script>
	$(function() {
		var carousel        = $('#carousel');
		var carousel_images = carousel.find('img');
		var images = [];
		<?php foreach($featured_shows as $show): ?>
			<?php foreach($show->images as $image): ?>
				<?php if($image['enabled'] == 1): ?>
					images.push('<a herf="/show/<?=$show->slug?>" target="_blank"><img src="<?=Image::getImageSize($image['path'],580, 326)?>" class="hidden" /></a>');
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>

		var images_length = images.length;
		var image_loaded  = 0;

		for (var i = 0; i < images_length; i++) {
			var image = $(images[i]);
			image.find('img').one('load', function() {
				image_loaded++;
				if(image_loaded === images_length) {
					initCarousel();
				}
			});

			carousel.append(image);
		};

		function initCarousel() {
			console.log('initializing carousel');

			//remove the loader
			$('#carousel .loader').remove();

			//add buton listeners
			$(".carousel .carousel-prev").click(function (e) {
				carousel.prev();
				return false;
			});

			$(".carousel .carousel-next").click(function (e) {
				carousel.next();
				return false;
			});

			carousel = carousel.waterwheelCarousel({
				autoPlay 	: 10000,
				separation 	: 200
			});

			$('.carousel').css('backgroundColor', '#FFF');
			
			console.log('carousel ready');
		}
	});
</script>

<!-- carousel -->
<div class="carousel">
	<div class="carousel-nav carousel-prev"></div>
	<div class="carousel-nav carousel-next"></div>
	<div id="carousel">
		<img src="/assets/images/loading.gif" class="loader" alt="" style="width: 30%" />
	</div>
</div>