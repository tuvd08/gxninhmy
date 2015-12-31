<?php 
$pageid = basename(get_permalink());
  $subcategories=get_category_by_slug($pageid);

  $qr_categories = $pageid;
  if($subcategories) {
    foreach($subcategories as $cat){
      if(isset($cat -> slug)) {
        $qr_categories .= ','.$cat -> slug;  
      }
    }
  }
	//$strQuery = array( 'posts_per_page' => 16, 'offset' => $offset, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' ); rand
  $strQuery = array('posts_per_page' => 100, 'category_name' => $qr_categories, 'orderby' => 'date', 'order' => 'DESC'  );
  $the_query = new WP_Query( $strQuery );
  $size = $the_query->found_posts;
  
?>

  <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

    <?php if($size > 0) { ?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><a style="text-decoration:none" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>
						<?php the_excerpt();//the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
			<?php } ?>
    <?php } else {
            $content= '';
            if(!isset($page_id)) {
              $page_id  = '';
            }            
            $page_data = get_page( $page_id );
            $content=apply_filters('the_content', $page_data->post_content);
            if(strlen($content) == 0) {
              $content = '<br><div class="alert alert-warning">Xin lỗi, mục này hiện chưa có bài viết nào, hãy quay lại sau nhé.</div>';
            }
            echo '<div class="entry-content">'. $content . '</div>';
          }
    ?>
  
		</div><!-- #content -->
	</div><!-- #primary -->
