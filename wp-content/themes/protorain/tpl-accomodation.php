<?php
/**
 * Template Name: Accommodation
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
<section class="accomodation">
	<div class="row">
		<div class="post-accomodation_location medium-12 columns">
			<ul class="tabs" data-tabs id="example-tabs1" role="tablist">
				<?php 
				$i=1;
				$acc_terms = get_terms('acc_places','hide_empty=0');
				foreach($acc_terms as $acc_term): 
					?>
				<li class="tabs-title <?php if($i==1) echo 'is-active';?>">
					<a href="#<?php echo $acc_term->slug;?>" aria-selected=<?php if($i==1) echo "true";?>><span><?php echo $acc_term->name;?></span></a>
				</li><?php $i++; endforeach;?>
			</ul>
			<div class="tabs-content" data-tabs-content="example-tabs1">
				<?php $i=1; ?>
				<?php foreach($acc_terms as $acc_term):?>
					<div class="tabs-panel <?php if($i==1) echo'is-active';?>"  id="<?php echo $acc_term->slug;?>">
						<!--tab content -->
						<?php $acc_arg = array('post_type'=>'accommodations',
							'posts_per_page'=>-1,
							'tax_query' => array(
								array(
									'taxonomy' => 'acc_places',
									'field' => 'slug',
									'terms' => $acc_term->slug, 
									'include_children' => false
									)
								)
							);
						$acc_posts = new Wp_Query($acc_arg);
						while($acc_posts->have_posts()):$acc_posts->the_post();
						?>
						<div class="post-accomodation_details">
							<div class="medium-12 columns">
								<?php $sectiontitle = get_post_meta( get_the_ID(), 'section_title1', true ); ?>
								<h3><?php echo the_title(); ?></h3>
							</div>
							<ul class="row">			
								<?php $acc_details = get_post_meta(get_the_ID(),'accomodation1_meta_group',true);
								foreach($acc_details as $acc_detail):?>				
								<li class="xsmall-12 small-6 medium-6 columns">									
									<div class="post-accomodation_thumbnail small-12 medium-12 large-12 columns">
										<img src="<?php echo $acc_detail['acc1_thumbnail']; ?>">
									</div>
									<div class="post-accomodation_details small-12 medium-12 large-12 columns">
										<h2><?php echo $acc_detail['acc1_title']; ?></h2>
										<?php echo wpautop ($acc_detail['description']); ?>
									</div>
								</li><?php endforeach; ?>
							</ul>
						</div><?php endwhile; ?>
						<!-- end of tab content -->
					</div> <?php $i++; ?><?php endforeach;?>
				</div>
			</div>
		</div>
	</section>
	<!--ends-->
	<?php get_footer();?>