<?php
/**
 * Template Name: Courses
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
			<h3><?php wp_title(''); ?></h3>
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
<section class="courses">
	<div class="row">
		<?php $details = get_terms('details','hide_empty=0');
		foreach($details as $det):
			$posts_ids = get_posts(array(
				"fields"    => "ids",
				'post_type' => 'coursedetails',
				'numberposts' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'details',
						'field' => 'slug',
						'terms' => $det->slug, // Where term_id of Term 1 is "1".
						'include_children' => false
						)
					)
				));
				?>
				<div class="post-course_details medium-12 columns">
					<h3>
						<?php echo $det->name;?>
						<ul class="dates">
							<?php
							$term_metas = get_option( "details_meta_date_$det->term_id" );
							if($term_metas!=''):
								foreach($term_metas as $t_meta):?>
							<li>
								<a data-open="datepop">
									<?php echo date('M d',strtotime($t_meta['from']));?>/<?php echo date('d',strtotime($t_meta['to']));?>
								</a>
							</li>
						<?php endforeach;
						endif;
						?>
					</ul>
				</h3>
				<div class="row">
					<!-- POST CODE -->
					<?php
					if(!empty($posts_ids)):
						$terms = wp_get_object_terms( $posts_ids, "days" );
					if(!empty($terms) && !is_wp_error($terms)):
						$r=1;
					foreach($terms as $term):
						// echo "<div class='term_wrapper'>";
						//echo 'as'.$r;
						$query_final = array('post_type'=>'coursedetails',
							'posts_per_page'=>-1,
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'details',
									'field' => 'slug',
									'terms' => $det->slug, // Where term_id of Term 1 is "1".
									'include_children' => false
									),
								array(
									'taxonomy' => 'days',
									'field' => 'slug',
								'terms' => $term->slug, // Where term_id of Term 1 is "1".
								'include_children' => false
								)
								)
							);
					$wp_final_query = new Wp_Query($query_final);
					$i=1;
					while($wp_final_query->have_posts()):$wp_final_query->the_post();
					$days = wp_get_post_terms(get_the_ID(),'days');
					// //var_dump($days);
					// echo $days[0]->name;
					// echo $term->name;
					//echo $i;
					?>
					<div class="post-course_content xsmall-12 small-6 medium-6 columns">
						<div class="row">
							<div class="post-course_day xsmall-12 small-2 medium-2 columns" <?php if($i>1)echo'style="display:none;"'?>>
								<h5><?php echo $term->name;?></h5>
							</div>
							<div class="xsmall-12 small-10 medium-10 columns">
								<h2><?php the_title();?></h2>
								<?php the_content();?>
							</div>
						</div>
					</div>
					<?php 
					$i++;
					endwhile;
					$r++;
					// echo "</div>";
		endforeach;//terms as term foreach
		endif;//not empty terms
			endif;//not empty post id
			?><!-- END POST CODE -->
		</div>
	</div>
<?php endforeach;?>
</div>	
</section>


<?php get_footer(); ?>
<!--modal-->
<!-- <div class="full reveal" id="<?php echo $datepop; ?>" data-reveal> -->
<div class="reveal" id="datepop" data-reveal>
	<p>Content Not yet supplied</p>
	<button class="close-button" data-close aria-label="Close reveal" type="button">
		<span aria-hidden="true">&times;</span>
	</button>
</div>