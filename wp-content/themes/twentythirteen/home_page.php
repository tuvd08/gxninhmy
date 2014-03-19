<?php
/**
Note:
the_post_thumbnail();                  // without parameter -> Thumbnail

the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)

the_post_thumbnail( array(100,100) );  // Other resolutions


**/
?>


<div class="home-page">
<?php
$categories = array("ha-giai-thanh-duong","thuong-vi-thanh-duong","thu-tro-giup", "cam-nhan-ve-thanh-duong");
foreach($categories as $cate) {
  $category = get_category_by_slug($cate);
  $strQuery = array( 'posts_per_page' => 5, 'category_name' => $cate, 'orderby' => 'date', 'order' => 'ASC' );
  $the_query = new WP_Query( $strQuery );
  
?>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $category->name;?></h3>
    </div>
    <div class="panel-body">
<?php
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $the_ID = get_the_ID();
      $the_clazz = "link-post";
?>
    <div class="the-post home-box">
      <div class="the-title clearfix">
        <?php if ( has_post_thumbnail() ) : ?>
          <a class="entry-thumbnail left" href="<?php echo get_permalink(); ?>" class="aImg53">
              <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail thumbnail-box')); $the_clazz = "title-post";?>
          </a>
        <?php endif; ?>
          <a href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php the_title(); ?>" class="<?php echo $the_clazz; ?>">
              <?php the_title(); ?>                                                                              
          </a>
          <?php the_excerpt(); ?>
      </div>
    </div>
<?php
    }
?>

    </div>
  </div>

<?php
}
wp_reset_postdata();

//
   $strQuery = array( 'posts_per_page' => 5, 'category_name' => 'tin-giao-hoi,cac-hoi-doan,hoc-sinh-va-sinh-vien,hon-nhan-gia-dinh', 'orderby' => 'date', 'order' => 'DES' );
   $the_query = new WP_Query( $strQuery );
?>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Thông Tin Khác</h3>
    </div>
    <div class="panel-body">
<?php
    while ( $the_query->have_posts() ) {
			$the_query->the_post();
      $the_ID = get_the_ID();
      $the_clazz = "link-post";
?>
    <div class="the-post">
      <div class="the-title clearfix">
        <?php if ( has_post_thumbnail() ) : ?>
          <a class="entry-thumbnail left" href="<?php echo get_permalink(); ?>" class="aImg53">
              <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail thumbnail-menu')); $the_clazz = "link-post-image title-post";?>
          </a>
        <?php endif; ?>
        
        <?php 
          $excerpt = get_the_excerpt();
          $excerpt = str_replace('<p>', '', $excerpt);
          $excerpt = str_replace('</p>', '', $excerpt);
        ?>
          <a href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $excerpt; ?>" class="<?php echo $the_clazz; ?>">
              <?php the_title(); ?> 
          </a>
      </div>
    </div>
<?php
    }
?>
    </div>
  </div>

</div>
<?php wp_reset_postdata(); ?>
