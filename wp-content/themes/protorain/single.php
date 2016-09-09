<?php
get_header();
?>
<div class="row">
	<section class="post-container small-12 medium-8 large-8 columns">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="post-title small-12 medium-12 large-12">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="post-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; endif; ?>
	</section>
	<aside class="right small-12 medium-4 large-4 columns">
		<div class="sidebar-products" data-equalizer data-equalize-on="medium" id="services-eq">
			<h3 class="wow bounceInUp">Products</h3>
			<div class="small-12 medium-12 large-12 columns wow bounceInUp">
				<div class="callout" data-equalizer-watch>
					<a href="">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/mobile-solutions.png">
						<h4>Mobile Solutions</h4>
					</a>
					<p>Quasi placeat eum doloremque odio cumque, laudantium reiciendis ea! </p>

				</div>
			</div>
			<div class="small-12 medium-12 large-12 columns wow bounceInUp">
				<div class="callout" data-equalizer-watch>
					<a href="">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/fdu.png">
						<h4>Fixed Solution</h4>
					</a>
					<p>Voluptatibus placeat vel iste reprehenderit? Expedita aperiam quo.</p>

				</div>
			</div>
			<div class="small-12 medium-12 large-12 columns wow fadeInUp">
				<div class="callout" data-equalizer-watch>
					<a href="">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/thuraya-ip.png">
						<h4>BroadBand</h4>
					</a>
					<p>Cupiditate assumenda blanditiis, quas velit autem necessitatibus tempora.</p>
				</div>
			</div>
		</div>
	</aside>
</div>
<?php get_footer();?>