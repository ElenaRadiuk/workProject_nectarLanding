  <?php

include('functions/settings.php');
  
define('HT_URI',  get_stylesheet_directory_uri());


function ht_styles_scripts(){
  wp_enqueue_script('jquery');
  wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap.min.css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_enqueue_style('ht_main_style', HT_URI.'/style.css');
  
  wp_enqueue_script( 'bootstrap.min.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' );

  wp_enqueue_style('bx_style', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css');
  wp_enqueue_script('bx_sider', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js');
  wp_enqueue_script('ht_main_script', HT_URI.'/js/htscript.js');
  if(is_home()){
    wp_enqueue_script('redirect', HT_URI.'/js/redirect.js');

  }


add_action('wp_enqueue_scripts', 'ht_styles_scripts');

function ht_theme_setup(){
  add_theme_support('title-tag', 'post-formats', 'automatic-feed-links');
  add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
  add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'ht_theme_setup' );

register_nav_menus(array(
  'mainmenu' => 'Main Menu',
  'ptopmenu' => 'Products Top Menu',
  'offer' => 'Offer'
));

function language_selector(){
  $languages = icl_get_languages('skip_missing=0&orderby=custom&order=asc');
  if(!empty($languages)){
    echo '<ul class="lansel">';
    foreach($languages as $l){
      echo '<li>';
      if(!$l['active']) echo '<a href="'.$l['url'].'">';
      echo ''.$l['tag'].'';
      if(!$l['active']) echo '</a>';
      echo '</li>';
    }
  }
  echo '</ul>';
}

function ht_types(){
  register_post_type('product', array(
    'labels' => array(
      'name' => __('Products', 'honey-theme'),
      'singular_name' => __('Product', 'honey-theme'),
    ),
    'public' => true,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields',
    )
  ));
  register_post_type('contact', array(
    'labels' => array(
      'name' => __('Contacts', 'honey-theme'),
      'singular_name' => __('Contact', 'honey-theme'),
    ),
    'public' => true,
    'supports' => array(
      'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'
    )
  ));
  register_taxonomy(
		'productscategory',
		'product',
		array(
			'label' => __( 'Category', 'honey-theme' ),
			'query_var' => true,
      'rewrite' => array( 'slug' => 'productscategory' ),
			'hierarchical' => true
		)
	);
}

add_action('init', 'ht_types');

function ht_meta_boxes(){
  //add_meta_box('show-post-date', __('Show Date', 'honey-theme'), )
}


add_action('add_meta_boxes', 'ht_meta_boxes');

add_filter( 'wpcf7_load_js', '__return_false' );

