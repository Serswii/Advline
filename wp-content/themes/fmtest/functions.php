<?php
/**
 * Test functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Test
 * @since Test 1.0
 */

require_once __DIR__ . '/Fmtest_Menu.php';



add_action('wp_enqueue_scripts', 'fmtest_scripts');
function fmtest_scripts()
{
    wp_enqueue_style('fmtest-all', get_template_directory_uri() . '/assets/css/all.css', wp_get_theme()->get('Version'));
    wp_enqueue_style('fmtest-style', get_stylesheet_uri(), wp_get_theme()->get('Version'));
    wp_deregister_script('jquery');
    wp_register_script('fmtest-jquery', get_template_directory_uri() . '/assets/js/jquery-3.1.1.min.js', false, wp_get_theme()->get('Version'));
    wp_enqueue_script('fmtest-jquery');
    wp_register_script('trueajax', get_stylesheet_directory_uri() . '/assets/js/ajax.js', ['fmtest-jquery'], wp_get_theme()->get('Version'), true);
    wp_localize_script(
        'trueajax',
        'pagination',
        array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );
    wp_enqueue_script('fmtest-jquery-main', get_template_directory_uri() . '/assets/js/jquery.main.js', ['fmtest-jquery'], wp_get_theme()->get('Version'), true);
    wp_enqueue_script('fmtest-jquery-plugins-min', get_template_directory_uri() . '/assets/js/jquery.plugins.min.js', ['fmtest-jquery'], wp_get_theme()->get('Version'), true);
    wp_enqueue_script('trueajax');
}

function fmtest_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('aside', 'link', 'image', 'status'));
}

add_action('after_setup_theme', 'fmtest_setup');
function fmtest_menu()
{
    register_nav_menus([
        'header_menu' => 'Меню в шапке',
    ]);
}

add_action('after_setup_theme', 'fmtest_menu');

add_action('wp_ajax_loadmore', 'true_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'true_loadmore');
function true_loadmore()
{
    $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
    $paged++;
    $category_name = $_POST['category_name'];
    query_posts(array(
        'paged' => $paged,
        'post_status' => 'publish',
        'category_name' => $category_name
    ));
    while (have_posts()): the_post();
        get_template_part('template-parts/content', get_post_format());
        echo "content-stop";
    endwhile;
    die;
}
add_action('wp_ajax_modalpost', 'true_modalpost');
add_action('wp_ajax_nopriv_modalpost', 'true_modalpost');
function true_modalpost()
{
    $id_post = $_POST['id'];
    $params = ['id_post' => $id_post];
//    $prevent = trim($_POST['prevent']);
//    $next = trim($_POST['next']);
    get_template_part('template-parts/content', 'slide', $params);
    get_template_part('template-parts/content', 'slide', $params);
    die;
}
add_action('wp_ajax_slideedit', 'true_slideedit');
add_action('wp_ajax_nopriv_slideedit', 'true_slideedit');
function true_slideedit()
{
    $id_post = $_POST['id_post'];
    foreach ($id_post as $post){
        $params = ['id_post' => $post];
        get_template_part('template-parts/content', 'slide', $params);
    }
    die;
}
//add_action( 'after_setup_theme', function(){
//    show_admin_bar( false );
//});


