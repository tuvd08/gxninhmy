<?php
/**
 * The template for displaying Author archive pages
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

                <?php
                  /*
                   * Queue the first post, that way we know what author
                   * we're dealing with (if that is the case).
                   *
                   * We reset this later so we can run the loop
                   * properly with a call to rewind_posts().
                   */
                  the_post();
                ?>

                <div class="alert alert-warning alert-dismissable">
                  <div><?php printf( __( 'Các bài viết tạo bởi <strong>%s</strong>', 'twentythirteen' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></div>
                </div>

                <?php
                  /*
                   * Since we called the_post() above, we need to
                   * rewind the loop back to the beginning that way
                   * we can run the loop properly, in full.
                   */
                  rewind_posts();
                ?>

                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                  <?php get_template_part( 'author-bio' ); ?>
                <?php endif; ?>

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
