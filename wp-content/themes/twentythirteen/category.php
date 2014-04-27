<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
      <table style="table-layout: fixed; margin: 0px auto; width: 100%">
        <tbody>
          <tr>
            <td class="left-column">
              <div class="min left-bar"></div>
              <div class="max menu-container"><?php get_main_menu(); ?></div>
            </td>
            <td class="main-column post-content">
            <?php if ( have_posts() ) : ?>
              <div class="alert alert-warning alert-dismissable">
                <div><?php printf( __( 'Các bài viết trong mục: <strong>%s</strong>', 'twentythirteen' ), single_cat_title( '', false ) ); ?></div>

                <?php if ( category_description() ) : // Show an optional category description ?>
                <div class="archive-meta"><?php echo category_description(); ?></div>
                <?php endif; ?>
              </div><!-- .archive-header -->

              <?php /* The loop */ ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content-simple', get_post_format() ); ?>
              <?php endwhile; ?>

              <?php twentythirteen_paging_nav(); ?>

            <?php else : ?>
              <?php get_template_part( 'content-simple', 'none' ); ?>
            <?php endif; ?>

            </td>
            <td class="right-column">
              <div class="min right-bar"></div>
              <div class="max right-container"><?php get_right_menu();?></div>
            </td>
          </tr>
        </tbody>
      </table>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
