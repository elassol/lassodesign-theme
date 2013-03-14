<?php

// Define Path and constant called THEME DIR that stores the template directory
define("THEME_DIR", get_template_directory_uri());  
/*--- REMOVE GENERATOR META TAG ---*/  
remove_action('wp_head', 'wp_generator'); 


// ENQUEUE STYLES       
function enqueue_styles() {  
      
    /** REGISTER css/screen.cs **/  
    wp_register_style( 'style', THEME_DIR . '/style.css', array(), '1', 'all' );  
    wp_enqueue_style( 'style' );  

    /** REGISTER css/screen.cs **/  
    wp_register_style( 'flexslider_css', THEME_DIR . '/css/flexslider.css');  
    wp_enqueue_style( 'flexslider_css' );  
          
}  

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );  



// ENQUEUE SCRIPTS      
function enqueue_scripts() {  
    
    /** DEREGISTER WORDPRESS JQUERY **/
    wp_deregister_script( 'jquery' );

    /** REGISTER JQuery **/  
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js' );  
    wp_enqueue_script( 'jquery' ); 

    /** REGISTER HTML5 Shim **/  
    wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );  
    wp_enqueue_script( 'html5-shim' );  
          
    /** REGISTER filterable  **/  
    wp_register_script( 'filterable', THEME_DIR . '/js/filterable.js', array( 'jquery' ), false, true ); 
    wp_enqueue_script( 'filterable' );  

    /** REGISTER flexslider  **/  
    wp_register_script( 'flexslider', THEME_DIR . '/js/jquery.flexslider-min.js', array( 'jquery' ), false, true ); 
    wp_enqueue_script( 'flexslider' );  
          
}  

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );  


 
//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


add_action('init', 'project_custom_init');

/* SECTION - project_custom_init */  

function project_custom_init()  
{  
    /// The following is all the names, in our tutorial, we use "Project"  
	$labels = array(  
	    'name' => _x('Projects', 'post type general name'),  
	    'singular_name' => _x('Project', 'post type singular name'),  
	    'add_new' => _x('Add New', 'project'),  
	    'add_new_item' => __('Add New Project'),  
	    'edit_item' => __('Edit Project'),  
	    'new_item' => __('New Project'),  
	    'view_item' => __('View Project'),  
	    'search_items' => __('Search Projects'),  
	    'not_found' =>  __('No projects found'),  
	    'not_found_in_trash' => __('No projects found in Trash'),  
	    'parent_item_colon' => '',  
	    'menu_name' => 'Portfolio'  
	);  
    
	// Some arguments and in the last line 'supports', we say to WordPress what features are supported on the Project post type  
	$args = array(  
	    'labels' => $labels,  
	    'public' => true,  
	    'publicly_queryable' => true,  
	    'show_ui' => true,  
	    'show_in_menu' => true,  
	    'query_var' => true,  
	    'rewrite' => true,  
	    'capability_type' => 'post',  
	    'has_archive' => true,  
	    'hierarchical' => false,  
	    'menu_position' => null,  
	    'supports' => array('title','editor','author','thumbnail','excerpt','comments')  
	);  
    
	// We call this function to register the custom post type  
	register_post_type('project',$args);    

	// Initialize Taxonomy Labels  
	$labels = array(  
	    'name' => _x( 'Tags', 'taxonomy general name' ),  
	    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),  
	    'search_items' =>  __( 'Search Types' ),  
	    'all_items' => __( 'All Tags' ),  
	    'parent_item' => __( 'Parent Tag' ),  
	    'parent_item_colon' => __( 'Parent Tag:' ),  
	    'edit_item' => __( 'Edit Tags' ),  
	    'update_item' => __( 'Update Tag' ),  
	    'add_new_item' => __( 'Add New Tag' ),  
	    'new_item_name' => __( 'New Tag Name' ),  
	);  
      
	// Register Custom Taxonomy  
	register_taxonomy('tagportfolio',array('project'), array(  
	    'hierarchical' => true, // define whether to use a system like tags or categories  
	    'labels' => $labels,  
	    'show_ui' => true,  
	    'query_var' => true,  
	    'rewrite' => array( 'slug' => 'tag-portfolio' ),  
	));  

}  
/* #end SECTION - project_custom_init --*/  



/*--- Custom Messages - project_updated_messages ---*/  
add_filter('post_updated_messages', 'project_updated_messages');  
  
function project_updated_messages( $messages ) {  
  global $post, $post_ID;  
  
  $messages['project'] = array(  
    0 => '', // Unused. Messages start at index 1.  
    1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),  
    2 => __('Custom field updated.'),  
    3 => __('Custom field deleted.'),  
    4 => __('Project updated.'),  
    /* translators: %s: date and time of the revision */  
    5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,  
    6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),  
    7 => __('Project saved.'),  
    8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),  
    9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),  
      // translators: Publish box date format, see http://php.net/date  
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),  
    10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),  
  );  
  
  return $messages;  
}  
  
/*--- #end SECTION - project_updated_messages ---*/  



/*--- Demo URL meta box ---*/  
  
// include the class in your theme or plugin
include_once('php/MetaBox.php');
include_once('php/MediaAccess.php');
 
// include css to help style our custom meta boxes
add_action( 'init', 'my_metabox_styles' );
 
function my_metabox_styles()
{
    if ( is_admin() ) 
    { 
        wp_enqueue_style( 'wpalchemy-metabox', THEME_DIR . '/css/meta.css' );
    }
}

$media_access = new WPAlchemy_MediaAccess();
 
$portfolio_meta = new WPAlchemy_MetaBox(array
(
    'id' => '_portfolio_meta',
    'title' => 'Portfolio Meta',
    'template' => STYLESHEETPATH . '/metaboxes/portfolio_metabox.php',
    'types' => array('project')
));
  
/*--- #end  Demo URL meta box ---*/ 

/*--- #start post thumbnail ---*/ 

add_action( 'after_setup_theme', 'lassodesigns_setup' );

function lassodesigns_setup() {
	add_theme_support( 'post-thumbnails' );

}

/*--- #end  post thumbnail ---*/ 



// Adding FlexSlider 
function efs_script(){  
  
print '<script type="text/javascript" charset="utf-8"> 
  jQuery(window).load(function() { 
    jQuery(\'.flexslider\').flexslider(); 
  }); 
</script>';  
  
}  
  
add_action('wp_head', 'efs_script');

function efs_get_slider(){  
  
$slider= '<div class="flexslider"> 
      <ul class="slides">';  
  
    $efs_query= "post_type=slider-image";  
    query_posts($efs_query);  
      
      
    if (have_posts()) : while (have_posts()) : the_post();   
        $img= get_the_post_thumbnail( $post->ID, 'large' );  
          
        $slider.='<li>'.$img.'</li>';  
              
    endwhile; endif; wp_reset_query();  
    $slider.= '</ul> 
    </div>';  
      
    return $slider;   
  
}  
/**add the shortcode for the slider- for use in editor**/  
  
function efs_insert_slider($atts, $content=null){  
  
$slider= efs_get_slider();  
  
return $slider;  
  
}  
add_shortcode('ef_slider', 'efs_insert_slider');  
/**add template tag- for use in themes**/  
  
function efs_slider(){  
  
    print efs_get_slider();  
}  


?>