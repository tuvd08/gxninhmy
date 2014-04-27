<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Thirteen
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
                <div>
                  <?php
                  if ( is_day() ) :
                    printf( __( 'Bài trong ngày: %s', 'twentythirteen' ), get_the_date() );
                  elseif ( is_month() ) :
                    printf( __( 'Bài trong tháng: %s', 'twentythirteen' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'twentythirteen' ) ) );
                  elseif ( is_year() ) :
                    printf( __( 'Bài trong năm: %s', 'twentythirteen' ), get_the_date( _x( 'Y', 'yearly archives date format', 'twentythirteen' ) ) );
                  else :
                    _e( 'Bài viết', 'twentythirteen' );
                  endif;
                  ?>
                </div>
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
