<?php 
$pageid = basename(get_permalink());
$cateNow = get_category_by_slug($pageid); 
  // find all the child categories of the current parent
  $args = array(
    'type'                     => 'post',
    'child_of'                 => 0,
    'parent'                   => $cateNow->term_id,
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 0,
    'hierarchical'             => 0,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false 

  ); 

  $subcategories=get_categories($args);
  $qr_categories = $pageid;
  foreach($subcategories as $cat){ $qr_categories .= ','.$cat -> slug;}
  
	//$strQuery = array( 'posts_per_page' => 16, 'offset' => $offset, 'category_name' => 'art_culture,food_travel,science_tech,health_sports', 'orderby' => 'date', 'order' => 'ASC' ); rand
  $strQuery = array( 'category_name' => $qr_categories, 'orderby' => $order );
  $the_query = new WP_Query( $strQuery );
  $size = $the_query->found_posts;
  
?>

  <div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

    <?php if($size > 0) { ?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt();//the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->
			<?php } ?>
    <?php } else { 
            $page_data = get_page( $page_id ); 
            echo '<div class="entry-content">'. apply_filters('the_content', $page_data->post_content) . '</div>';
          }
    ?>
  
		</div><!-- #content -->
	</div><!-- #primary -->
