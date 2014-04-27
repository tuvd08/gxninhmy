<?php
/**
 * The default template for displaying simple content
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
      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
      </h1>
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
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->
    <footer class="entry-meta">
      <div class="comments-link">
          <?php comments_popup_link( '<span class="leave-reply">' . __( 'Cảm nhận về bài viết này', 'twentythirteen' ) . '</span>', __( 'Có duy nhất một cảm nhận', 'twentythirteen' ), __( 'Xem tất cả % cảm nhận', 'twentythirteen' ) ); ?>
      </div><!-- .comments-link -->
    </footer><!-- .entry-meta -->
  </article><!-- #post -->
</div>

