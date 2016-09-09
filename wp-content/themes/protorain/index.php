<?php
get_header(); ?>
<?php global $adimworks; ?>

<section class="carousel">
	<div class="owl-carousel">
		<?php if (isset($adimworks['mainslider']) && !empty($adimworks['mainslider'])) {$mainlider= $adimworks['mainslider'];} ?>
		<?php foreach($mainlider as $slide) { ?>
			<div class="item">
				<a href="<?php echo $slide['url']; ?>" target="_blank">
					<div class="banner-content">
						<img src="<?php echo $slide['image']; ?>">
						<h3><?php echo $slide['title']; ?></h3>
						<h3><?php echo $slide['description']; ?></h3>
					</div>
				</a>
			</div>
			<?php 
		} ?>
	</div>
</section>
<?php get_footer(); ?>