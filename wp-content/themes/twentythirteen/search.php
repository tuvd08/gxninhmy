<?php
/**
 * The template for displaying Search Results pages
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
                 <?php printf( __( 'Kết quả tìm kiếm theo từ: %s</strong>', 'twentythirteen' ), get_search_query() ); ?>
              </div>

              <?php /* The loop */ ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content-search', get_post_format() ); ?>
              <?php endwhile; ?>

              <?php twentythirteen_paging_nav(); ?>

            <?php else : ?>
              <?php get_template_part( 'content-search', 'none' ); ?>
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
