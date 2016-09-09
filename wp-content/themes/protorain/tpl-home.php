<?php
/**
 * Template Name: HomePage
 *
 */
get_header();
?>
<section class="carousel">
	<div class="banner-home" id="banner_carousel">
		<?php while(have_posts()): the_post(); ?>
			<?php 
			$entries = get_post_meta( get_the_ID(), 'banner_meta_group', true );
			foreach ( (array) $entries as $key => $entry ) 
			{
				$banner_image = $banner_title = $banner_desc = '';
				if ( isset( $entry['banner_image_id'] ) ) {
					$banner_image = wp_get_attachment_image( $entry['banner_image_id'], 'share-pick', null, array(
						'class' => 'full',
						)
					);
				}
				if ( isset( $entry['banner_title'] ) )
					$banner_title = ( $entry['banner_title'] );
				if ( isset( $entry['banner_desc'] ) )
					$banner_desc = ( $entry['banner_desc'] );
				?>
				<div class="homeitem">
					<img src="<?php echo $entry['banner_image']; ?>" alt="">
					<div class="homeitem-table">
						<div class="table-display">
							<div class="item-desc ">
								<div class="item-desc_wrapper">
									<div class="row">
										<div class="medium-12 columns">
											<h3><?php echo $banner_title; ?> </h3>
											<?php echo $banner_desc; ?> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
			} 
			?>
		<?php endwhile;?>
	</div>
</section>

<section class="newsletter">
	<div class="row">
		<div class="newsletter-subscribe xsmall-12 small-10 small-centered medium-10 medium-centered large-8 large-centered columns">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('newsletter') ) : ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="home-content">
	<div class="row">
		<div class="post-home_left small-6 medium-6 large-7 columns">
			<ul>
				<?php while(have_posts()): the_post(); ?>
					<?php 
					$entries = get_post_meta( get_the_ID(), 'advantage_meta_group', true );
					foreach ( (array) $entries as $key => $entry ) 
					{
						$advantage_thumbnail = $advantage_title = $advantage_desc = '';
						if ( isset( $entry['banner_image_id'] ) ) {
							$advantage_thumbnail = wp_get_attachment_image( $entry['advantage_thumbnail_id'], 'share-pick', null, array(
								'class' => 'full',
								)
							);
						}
						if ( isset( $entry['advantage_title'] ) )
							$advantage_title = ( $entry['advantage_title'] );
						if ( isset( $entry['advantage_desc'] ) )
							$advantage_desc = ( $entry['advantage_desc'] );
						?>

						<li>
							<div class="post-home_thumbnail small-12 medium-3 large-3 columns">
								<img src="<?php echo $entry['advantage_thumbnail'];?>" alt="">
							</div>
							<div class="small-12 medium-9 large-9 columns">
								<h2><?php echo $advantage_title; ?> </h2>
								<?php echo wpautop($advantage_desc); ?> 
							</div>
						</li>
						<?php 
					} 
					?>
				<?php endwhile;?>
			</ul>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer();?>