<?php
/**
 * Template Name: About
 *
 */
get_header();
?>
<section class="header-image">
	<div class="post-title">
		<div class="post-title_header--image">
			<?php 
			if ( has_post_thumbnail() ) { the_post_thumbnail('header-image', array(1920, 300));} 
			else{ ?>
				<img src="<?php bloginfo('template_url');?>/assets/images/postholder.jpg">
				<?php 
			} ?>
		</div>

		<div class="post-title_wrap xsmall-12 small-12 medium-12">
			<?php while(have_posts()): the_post(); ?>
				<h3><?php wp_title(''); ?></h3>
			<?php endwhile; ?>
		</div>
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
<section class="about">
	<div class="row">
		<div class="post-about_details">
			<div class="medium-12 columns">
				<?php $sectiontitle = get_post_meta( get_the_ID(), 'section_title', true ); ?>
				<h3><?php echo $sectiontitle; ?></h3>
			</div>
			<ul class="row">
				<?php while(have_posts()): the_post(); ?>
					<?php 
					$entries = get_post_meta( get_the_ID(), 'teacher_meta_group', true );
					foreach ( (array) $entries as $key => $entry ) 
					{
						$teacher_image = $teacher_title = $teacher_desc = '';
						if ( isset( $entry['teacher_image_id'] ) ) {
							$teacher_image = wp_get_attachment_image( $entry['teacher_image_id'], 'share-pick', null, array(
								'class' => 'full',
								)
							);
						}
						if ( isset( $entry['teacher_title'] ) )
							$teacher_title = ( $entry['teacher_title'] );
						if ( isset( $entry['teacher_desc'] ) )
							$teacher_desc = ( $entry['teacher_desc'] );
						?>
						<li class="xsmall-12 small-6 medium-6 columns">
							<div class="post-about_thumbnail small-12 medium-3 large-3 columns">
								<img src="<?php echo $entry['teacher_image']; ?>" alt="">
							</div>
							<div class="post-about_details small-12 medium-9 large-9 columns">
								<h2><?php echo $teacher_title; ?> </h2>
								<?php echo wpautop($teacher_desc); ?> 
							</div>

						</li>
						<?php 
					}
					?>
				<?php endwhile;?>
			</ul>
		</div>
	</div>
</section>
<section class="about">
	<div class="row">
		<div class="post-about_details">
			<div class="medium-12 columns">
				<?php $sectiontitle = get_post_meta( get_the_ID(), 'section_title1', true ); ?>
				<h3><?php echo $sectiontitle; ?></h3>
			</div>
			<ul class="row">
				<?php while(have_posts()): the_post(); ?>
					<?php 
					$entries = get_post_meta( get_the_ID(), 'venue_meta_group', true );
					foreach ( (array) $entries as $key => $entry ) 
					{
						$venue_thumbnail = $venue_title = $venue_desc = '';
						if ( isset( $entry['venue_thumbnail_id'] ) ) {
							$venue_thumbnail = wp_get_attachment_image( $entry['venue_thumbnail_id'], 'share-pick', null, array(
								'class' => 'full',
								)
							);
						}
						if ( isset( $entry['venue_title'] ) )
							$venue_title = ( $entry['venue_title'] );
						if ( isset( $entry['venue_desc'] ) )
							$venue_desc = ( $entry['venue_desc'] );
						?>
						<li class="xsmall-12 small-6 medium-6 columns">
							<div class="post-about_thumbnail small-12 medium-3 large-3 columns">
								<img src="<?php echo $entry['venue_thumbnail']; ?>" alt="">
							</div>
							<div class="post-about_details small-12 medium-9 large-9 columns">
								<h2><?php echo $venue_title; ?> </h2>
								<?php echo wpautop($venue_desc); ?> 
							</div>

						</li>
						<?php 
					}
					?>
				<?php endwhile;?>
			</ul>
		</div>
	</div>
</section>
<section class="about">
	<div class="row">
		<div class="post-about_details">
			<div class="medium-12 columns">
				<?php $sectiontitle = get_post_meta( get_the_ID(), 'section_title2', true ); ?>
				<h3><?php echo $sectiontitle; ?></h3>
			</div>
			<ul class="row">
				<?php while(have_posts()): the_post(); ?>
					<?php 
					$entries = get_post_meta( get_the_ID(), 'details_meta_group', true );
					foreach ( (array) $entries as $key => $entry ) 
					{
						$thumbnail = $title = $desc = '';
						if ( isset( $entry['thumbnail_id'] ) ) {
							$thumbnail = wp_get_attachment_image( $entry['thumbnail_id'], 'share-pick', null, array(
								'class' => 'full',
								)
							);
						}
						if ( isset( $entry['title'] ) )
							$title = ( $entry['title'] );
						if ( isset( $entry['desc'] ) )
							$desc = ( $entry['desc'] );
						?>
						<li class="xsmall-12 small-6 medium-6 columns">
							<div class="post-about_thumbnail small-12 medium-3 large-3 columns">
								<img src="<?php echo $entry['thumbnail']; ?>" alt="">
							</div>
							<div class="post-about_details small-12 medium-9 large-9 columns">
								<h2><?php echo $title; ?> </h2>
								<?php echo wpautop($desc); ?> 
							</div>
						</li>
						<?php 
					}
					?>					
				<?php endwhile;?>
			</ul>
		</div>
	</div>
</section>
<?php get_footer();?>