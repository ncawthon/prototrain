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
	<?php get_sidebar();?>
</div>
<?php get_footer();?>