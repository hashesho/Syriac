<?php


if(function_exists('pll_register_string')){
	pll_register_string('Latest Decisions', 'Latest Decisions');
}
function syriacscout_resources()
{
    wp_enqueue_style('bootstrap-core', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/css/aos.css');
    wp_enqueue_style('glightbox-css', get_template_directory_uri() . '/assets/css/glightbox.min.css');
    wp_enqueue_style('custom', get_template_directory_uri() . '/style.css');

    wp_enqueue_script('aos-js', get_template_directory_uri() . '/assets/js/aos.js', null, null, true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('glightbox-js', get_template_directory_uri() . '/assets/js/glightbox.min.js', null, null, true);
    wp_enqueue_script('isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', null, null, true);
    wp_enqueue_script('swiper-bundle-js', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', null, null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', null, null, true);
}

add_action('wp_enqueue_scripts', 'syriacscout_resources');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

}
add_action('after_setup_theme', 'register_navwalker');

register_nav_menus(array(
    'primary' => __('Primary Menu')
));


function catch_first_image()
{
	global $post;
    $first_image = '';
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_image = $matches[1][0];

    if (empty($first_image)) {
        $first_img = "";
    }
    return $first_image;
}

function get_content_text(){
    $content = get_the_content();
    $content = preg_replace('/(<)([img])(\w+)([^>])*>/', "" , $content);
    $content = preg_replace('/(<)([ul])(\w+)([^>])*>/', "" , $content);
    $content = preg_replace('/(<)([figure])(\w+)([^>])*>/', "" , $content);
    $content = apply_filters( 'the_content', $content );
    $content = str_replace(']]>', ']]]$gt;', $content);
    return $content;
}

function custom_excerpt_length(){
    return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more(){
    return "...";
}

add_filter( 'excerpt_more', 'custom_excerpt_more');


function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_action( 'pre_get_posts', 'SearchFilter' );

add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
function add_search_form($items, $args) {
if( $args->theme_location == 'primary' )
        $items .= '<li class="search"><form role="search" method="get" class="search-form nav-link" action="' . home_url( '/' ) . '">
        <label>
            <span class="screen-reader-text"></span>
            <input type="search" class="search-field form-control w-165"
                placeholder="' . esc_attr_x( 'Search …', 'placeholder' ) . '"
                value="' . get_search_query() .'" name="s"
                title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
        </label>
        <button type="submit" class="search-submit vertical-inherit btn btn-warning"><i class="fas fa-search"></i></button>
    </form></li>';
        return $items;
}


