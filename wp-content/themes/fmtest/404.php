<?php
/**
 * The template for displaying the 404 template in the Test theme.
 *
 * @package WordPress
 * @subpackage Test
 * @since Test 1.0
 */

get_header();
?>

    <main id="site-content">

        <div class="section-inner thin error404-content" style="padding: 40px">
            <div class="container">
                <h1 class="entry-title"><?php _e( 'Страницы не существует', 'test' ); ?></h1>

                <div class="intro-text"><p><?php _e( 'Страница, которую вы искали, не может быть найдена. Возможно, он был удален, переименован или вообще не существовал.', 'test' ); ?></p></div>
            </div>
        </div><!-- .section-inner -->

    </main><!-- #site-content -->
<?php
get_footer();
