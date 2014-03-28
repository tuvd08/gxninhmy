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
  
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Thông Tin Mới Nhất</h3>
    </div>
    <div class="panel-body" style="padding: 15px 10px;">
      <div class="the-post home-box fist-home">
        <div class="the-title clearfix">
       <?php 
      $strQuery = array( 'posts_per_page' => 6, 'orderby' => 'date', 'order' => 'DESC' );
      $the_query = new WP_Query( $strQuery );
      $isFirst = true;
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $the_ID = get_the_ID();
        ?>

    <?php if($isFirst === true) { $isFirst = false; ?>
        <?php if ( has_post_thumbnail() ) : ?>
          <a class="entry-thumbnail left"  style="margin-right: 10px;" href="<?php echo get_permalink(); ?>">
              <?php the_post_thumbnail('medium', array('class' => 'thumbnail medium-box')); $the_clazz = "title-post";?>
          </a>
        <?php endif; ?>
          <span>
            <div>
              <a href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php the_title(); ?>" class="<?php echo $the_clazz; ?>">
                  <?php the_title(); ?>                                                                              
              </a>
              <?php the_excerpt(); ?>
            </div>
            <div class="clearfix">
    <?php } else { ?>

              <div class="the-post left" style="padding:2px 0px; max-height:37px">
                <div class="the-title clearfix">
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="avatarCircle left">
                    <a class="entry-thumbnail" href="<?php echo get_permalink(); ?>">
                        <?php the_post_thumbnail('home-thumb', array('class' => 'thumbnail-left-menu')); $the_clazz = "link-post-image title-post";?>
                    </a>
                  </div> 
                <?php endif; ?>
                <?php 
                  $excerpt = get_the_excerpt();
                  $excerpt = str_replace('<p>', '', $excerpt);
                  $excerpt = str_replace('</p>', '', $excerpt);
                ?>
                  <a class="ellipsis sub-post" data-toggle="tooltip" data-placement="bottom" title="<?php echo $excerpt; ?>" href="<?php echo get_permalink(); ?>" class="<?php echo $the_clazz; ?>">
                      <span><?php the_title(); ?></span>
                  </a>
                </div>
              </div>
    <?php } ?>  
    <?php 
      }
    ?>      </div>
          </span>
          
        </div>
      </div>
    </div>
  </div>

<?php
  wp_reset_postdata();
  //
  $in_cats = "xay-dung-thanh-duong,thuong-vi-thanh-duong,thu-tro-giup";
  $strQuery = array( 'posts_per_page' => 5, 'category_name' => $in_cats, 'orderby' => 'date', 'order' => 'DESC' );
  $the_query = new WP_Query( $strQuery );
  
?>

 <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Tiến Độ Công Trình Thánh Đường</h3>
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
  wp_reset_postdata();
  //
$categories = array("thanh-duong-cu-ha-giai", "cam-nhan-ve-thanh-duong");
foreach($categories as $cate) {
  $category = get_category_by_slug($cate);
  $strQuery = array( 'posts_per_page' => 5, 'category_name' => $cate, 'orderby' => 'date', 'order' => 'DESC' );
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
   $strQuery = array( 'posts_per_page' => 5, 'category_name' => 'sinh-hoat-giao-xu,cac-hoi-doan,hoc-sinh-va-sinh-vien,hon-nhan-gia-dinh', 'orderby' => 'date', 'order' => 'DESC' );
   $the_query = new WP_Query( $strQuery );
?>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Sinh Hoạt Của Giáo Xứ</h3>
    </div>
    <div class="panel-body">
<?php
    while ( $the_query->have_posts() ) {
			$the_query->the_post();
      $the_ID = get_the_ID();
      $the_clazz = "mini-link-post";
?>
    <div class="the-post">
      <div class="the-title clearfix">
        <?php if ( has_post_thumbnail() ) : ?>
          <a class="entry-thumbnail left" href="<?php echo get_permalink(); ?>" class="aImg53">
              <?php the_post_thumbnail('home-thumb', array('class' => 'thumbnail mini-thumbnail-menu')); $the_clazz = "title-post mini-link-post-image ellipsis";?>
          </a>
        <?php endif; ?>
        
        <?php 
          $excerpt = get_the_excerpt();
          $excerpt = str_replace('<p>', '', $excerpt);
          $excerpt = str_replace('</p>', '', $excerpt);
        ?>
          <a href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $excerpt; ?>" class="<?php echo $the_clazz; ?>">
              <?php the_title(); echo ' - ' . get_the_date(). ''; ?>
          </a>
      </div>
    </div>
<?php
    }
?>
    </div>
  </div>


<?php
wp_reset_postdata();

//
   $strQuery = array( 'posts_per_page' => 10, 'category_name' => 'tin-tuc,tin-giao-hoi,tu-lieu-cong-giao,thanh-nhac,phim-anh', 'orderby' => 'date', 'order' => 'DESC' );
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
      $the_clazz = "mini-link-post";
?>
    <div class="the-post">
      <div class="the-title clearfix">
        <?php if ( has_post_thumbnail() ) : ?>
          <a class="entry-thumbnail left" href="<?php echo get_permalink(); ?>">
              <?php the_post_thumbnail('home-thumb', array('class' => 'thumbnail mini-thumbnail-menu')); $the_clazz = "title-post mini-link-post-image ellipsis";?>
          </a>
        <?php endif; ?>
        
        <?php 
          $excerpt = get_the_excerpt();
          $excerpt = str_replace('<p>', '', $excerpt);
          $excerpt = str_replace('</p>', '', $excerpt);
        ?>
          <a href="<?php echo get_permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $excerpt; ?>" class="<?php echo $the_clazz; ?>">
              <?php the_title(); echo ' - ' . get_the_date(). ''; ?>
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
