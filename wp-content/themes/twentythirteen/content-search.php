<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>


<div class="uiBox on-hide-menu" id="post-detail">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

      <?php if ( is_single() ) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
      <?php endif; // is_single() ?>

      <div class="entry-meta">
        <?php twentythirteen_entry_meta(); ?>
        <?php edit_post_link( __( 'Sửa bài', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <?php if ( has_post_thumbnail() ) : ?>
      <div class="entry-thumbnail image-resize">
        <?php $full_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');  ?>
        <a class="image-box" href="<?php echo $full_img[0]; ?>">
          <?php the_post_thumbnail("large"); ?>
        </a>
      </div>
    <?php endif; ?>

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content image-resize">
      <?php the_content( __( 'Tiếp tục...<span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
      <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Trang:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
    </div><!-- .entry-content -->
    <?php endif; ?>

    <footer class="entry-meta">
      <?php if ( comments_open() && ! is_single() ) : ?>
        <div class="comments-link">
          <?php comments_popup_link( '<span class="leave-reply">' . __( 'Cảm nhận về bài viết này', 'twentythirteen' ) . '</span>', __( 'Có duy nhất một cảm nhận', 'twentythirteen' ), __( 'Xem tất cả % cảm nhận', 'twentythirteen' ) ); ?>
        </div><!-- .comments-link -->
      <?php endif; // comments_open() ?>
      <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
        <?php get_template_part( 'author-bio' ); ?>
      <?php endif; ?>
    </footer><!-- .entry-meta -->
  </article><!-- #post -->
</div>

