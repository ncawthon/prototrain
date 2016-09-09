<?php 
// Register Custom Post Type
add_action('init', 'course_init');
function course_init() {
	$labels = array(
		'name' => _x('Course', 'post type general name'),
		'singular_name' => _x('Course', 'post type singular name'),
		'add_new' => _x('Add course', 'course'),
		'add_new_item' => __('Add New course'),
		'edit_item' => __('Edit course'),
		'new_item' => __('New course'),
		'view_item' => __('View course'),
		'search_items' => __('Search course'),
		'not_found' => __('No course found'),
		'not_found_in_trash' => __('No course found in Trash'),
		'_builtin' => false,
		'parent_item_colon' => '',
		'menu_name' => 'Courses'
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array(
			'slug' => 'coursedetails',
			'with_front' => false
			),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 9,
		'supports' => array('title','editor','excerpt', 'revisions','thumbnail')
		);
	register_post_type('coursedetails', $args);
}
function course_rewrite_flush() {
	course_init();
	flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'course_rewrite_flush');
function create_course_tax() {
	$args = array(
		'label'             => __( 'Course Category' ),
    'hierarchical'      => true,//true for category type and false for tag
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    );
	register_taxonomy( 'details', array( 'coursedetails' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_course_tax', 0 );
function create_days_tax() {
	$args = array(
		'label'             => __( 'Course Offered Days' ),
    'hierarchical'      => true,//true for category type and false for tag
    'public'            => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    );
	register_taxonomy( 'days', array( 'coursedetails' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_days_tax', 0 );
// Add term page
// A callback function to add a custom field to our "presenters" taxonomy  
function pippin_taxonomy_add_new_meta_field($tag) {  
   // Check for existing taxonomy meta for the term you're editing  
    $t_id = $tag->term_id; // Get the ID of the term you're editing  
    $term_meta = get_option( "details_meta_date_$t_id" ); // Do the check
    //var_dump($term_meta);
    ?>  
    
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label><?php _e('DATES'); ?></label>  
        </th>
        <td> 
            <div id="date_form">
                <?php
                if($term_meta!=''):
                   $c =1;
               foreach($term_meta as $t_meta):
    	//var_dump($t_meta);
                   ?>
               <div>
                From: <input type="text_small" name="details_meta_date[<?php echo $c;?>][from]" class="details_meta_date"  value="<?php echo $t_meta['from']?>">
                To: <input type="text_small" name="details_meta_date[<?php echo $c;?>][to]" class="details_meta_date"  value="<?php echo $t_meta['to']?>">
                <?php if($c>1):?>
                <a href='#!' class='remove_date'>Remove</a>
            <?php endif;?>
            <br />
        </div>
        <?php
        $c++;
        endforeach;
        else:?>
           <div data=1>
            From: <input type="text_small" name="details_meta_date[1][from]" class="details_meta_date"  value="">
            To: <input type="text_small" name="details_meta_date[1][to]" class="details_meta_date"  value="">
            <br />
        </div>
    <?php endif;
    ?>
</div>
<span class="description"><?php _e('Dates For specific taxonomy'); ?></span>
<a href="#!" id="add_date" data='<?php if($term_meta!='') echo $c; else echo '2';?>'>Add more date</a>  
</td>

</tr>

<?php  
} 

//add_action( 'details_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );
function pippin_taxonomy_save_meta_field($term_id )
{
	//var_dump($_POST);
	if ( isset( $_POST['details_meta_date'] ) ) {
		$terms_value = $_POST['details_meta_date'];

        $t_id = $term_id;
        $i=1;
        // var_dump(( $_POST['details_meta_date'] ));
        // exit;
        // foreach($terms_value as $t_v)
        // {
        // 	var_dump($t_v);

        	// if($i==count($terms_value))
        	// {
        	// 	$values .= strtotime($t_v);
        	// }
        	// else
        	// {
        	// 	$values .= strtotime($t_v).'#';	
        	// }
        // }exit;
        //$term_meta = get_option( "details_meta_date_$t_id" );  
        $cat_keys = array_keys( $_POST['details_meta_date'] );  
        foreach ( $cat_keys as $key ){  
            if ( isset( $_POST['details_meta_date'][$key] ) ){  
                $term_meta[$key] = $_POST['details_meta_date'][$key];  
            }  
        }  
        //save the option array  
        // var_dump($term_meta);
        // exit;
        update_option( "details_meta_date_$t_id", $term_meta );  
    }  
}
add_action('details_edit_form_fields','pippin_taxonomy_add_new_meta_field');
add_action('details_add_form_fields','pippin_taxonomy_add_new_meta_field');
add_action('edited_details','pippin_taxonomy_save_meta_field');

wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
wp_register_script( 'date_script', get_bloginfo('template_url')."/assets/js/date.js" );
wp_enqueue_script( 'date_script' );
function mh_load_my_script() {
    wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'mh_load_my_script' );
?>