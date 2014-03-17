<div class="right_menu">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Xây Dựng Nhà Thờ</h3>
    </div>
    <div class="panel-body">
      <?php 
      $strQuery = array( 'posts_per_page' => 10, 'category_name' => 'xay-dung-thanh-duong,ha-giai-thanh-duong,thuong-vi-thanh-duong,thu-ngo,cam-nhan-ve-thanh-duong', 'orderby' => 'date', 'order' => 'DES' );
      $the_query = new WP_Query( $strQuery );
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $the_ID = get_the_ID();
      ?>
          <div class="the-post">
            <div class="the-title clearfix">
               <?php if ( has_post_thumbnail() ) : ?>
                <a class="entry-thumbnail left" href="<?php echo get_permalink(); ?>" class="aImg53">
                    <?php the_post_thumbnail('home-thumb', array('class' => 'thumbnail-left-menu')); $the_clazz = "link-post-image title-post";?>
                </a>
              <?php endif; ?>
                <a class="ellipsis" style="margin-left: 35px" data-toggle="tooltip" data-placement="bottom" title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>" class="<?php echo $the_clazz; ?>">
                    <?php the_title(); ?>                                                                              
                </a>
            </div>
          </div>
      <?php
          }
      ?>
    </div>
  </div>
  
   <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Thông Tin Mới Nhất</h3>
    </div>
    <div class="panel-body" style="padding: 15px 10px;">
       <?php 
      $strQuery = array( 'posts_per_page' => 10, 'category__not_in' => '2,15,16,17,19', 'orderby' => 'date', 'order' => 'DES' );
      $the_query = new WP_Query( $strQuery );
      while ( $the_query->have_posts() ) {
        $the_query->the_post();
        $the_ID = get_the_ID();
      ?>
          <div class="the-post" style="padding:2px 0px;">
            <div class="the-title clearfix">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="avatarCircle left">
                <a class="entry-thumbnail" href="<?php echo get_permalink(); ?>" class="aImg53">
                    <?php the_post_thumbnail('home-thumb', array('class' => 'thumbnail-left-menu')); $the_clazz = "link-post-image title-post";?>
                </a>
              </div> 
            <?php endif; ?>
              <a class="ellipsis" style="margin-left: 40px; line-height:32px" data-toggle="tooltip" data-placement="bottom" title="<?php the_title(); ?>" href="<?php echo get_permalink(); ?>" class="<?php echo $the_clazz; ?>">
                  <?php the_title(); ?>                                                                              
              </a>
            </div>
          </div>
      <?php
          }
      ?>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Video về Giáo Xứ</h3>
    </div>
    <div class="panel-body">
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Hình Ảnh về Giáo Xứ</h3>
    </div>
    <div class="panel-body">
    </div>
  </div>
</div>
