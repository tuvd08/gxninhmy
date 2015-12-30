<div class="main_menu">
  <div class="uiHomeMenu">
      <h5 class="title">Danh Mục</h5>
      
      <ul class="uiNavigations">  
      
      <?php 
        $GLOBALS["pageid"] = "home";
        $GLOBALS["parentId"] = "home";
        //
        $pageid = basename(get_permalink());
        
        if(is_search() || strcmp($pageid, "") == 0 || strcmp($pageid, "ninhmy.net") == 0) {
          $isHome = true;
        }
        if(!$isHome) {
          $cat = get_category_by_slug($pageid);

          if($cat && $cat -> slug) {
            $GLOBALS["pageid"] = $cat -> slug;
          }
          
          if($cat && $cat -> category_parent > 0) {
             $cat = get_term( $cat -> category_parent, 'category' );
          }
          if($cat && $cat -> slug) {
            $pageid = $cat -> slug;
          }
          //
          $cats = get_the_category( get_the_ID() );
          if(count($cats) > 0) {
            $homeCate = $cats[count($cats)-1];
            $GLOBALS["pageid"] = $cats[0] -> slug;
            //
            if($homeCate -> category_parent > 0) {
              $homeCate = get_term( $homeCate -> category_parent, 'category' );
            }
            $pageid = $homeCate -> slug;
          }
          
          if($pageid === 'thanh-duong-cu-ha-giai' || $pageid === 'cam-nhan-ve-thanh-duong') {
            $pageid = 'xay-dung-thanh-duong';
          }
        }
        //
        $args = array(
          'sort_order' => 'ASC',
          'sort_column' => 'menu_order',
          'hierarchical' => 1,
          'exclude' => '',
          'include' => '',
          'meta_key' => '',
          'meta_value' => '',
          'authors' => '',
          'child_of' =>0,
          'parent' => 0,
          'exclude_tree' => '',
          'number' => '',
          'offset' => 0,
          'post_type' => 'page',
          'post_status' => 'publish'
        );

      $pages = get_pages($args); 

      if($isHome != true) {
        $GLOBALS["parentId"] = $pageid;
      }
      //      
      $my_wp_query = new WP_Query();
      $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

      
      foreach( $pages as $p ) {
        $clazz = "navItem";
        if(strcmp($p -> post_name, $pageid) == 0 || $isHome === true && strcmp($p -> post_name, "home") == 0) {
          $clazz = "navItemSelected";
        }
        
        if($p->post_parent) {
          $children = wp_list_pages("title_li=&child_of=".$p->post_parent."&echo=0");
        } else {
          $children = wp_list_pages("title_li=&child_of=".$p->ID."&echo=0");
        }
        
        echo '<li class="dropdown '. $clazz .'">';
        
        if($children) {
          echo '  <a class="dropdown-toggle" data-toggle="dropdown" href="'. site_url() .'/' . $p -> post_name . '">'. $p->post_title .'</a>';
          echo '<ul class="dropdown-menu sub-menu">';
          echo $children;
          echo '</ul>';
        } else {
          echo '  <a class="menu-item" href="'. site_url() .'/' . $p -> post_name . '">'. $p->post_title .'</a>';
        }
        
        echo '</li>';
        
      }
      
      ?>
    </ul>
    
    <h5 class="title" style="border-top:1px solid #cccccc">Thống Kê</h5>
    <ul class="list-group statistic"> 
      <li class="list-group-item" id="day"><span class="lb">Trong ngày</span></li>
      <li class="list-group-item" id="week"><span class="lb">Trong tuần</span></li>
      <li class="list-group-item" id="month"><span class="lb">Trong tháng</span></li>
      <li class="list-group-item" id="year"><span class="lb">Trong năm</span></li>
      <li class="list-group-item" id="all"><span class="lb">Tất cả(4/4/2014)</span></li>
    </ul>
    <?php
    if(function_exists('isMobie') === false || (isMobie() === false)) {
    ?>
      <h5 class="title" style="border-top:1px solid #cccccc">
        <a target="_blank" href="https://plus.google.com/photos/+Gi%C3%A1oX%E1%BB%A9NinhM%E1%BB%B9/albums/5133683255739020865">
        Tuần Chầu Ninh Mỹ 2007
        </a>
      </h5>
      <div class="list-group statistic"> 
        <?php 
        $url_test="https://plus.google.com/photos/+Gi%C3%A1oX%E1%BB%A9NinhM%E1%BB%B9/albums/5133683255739020865";
        echo get_the_album($url_test, 'w292-h218');
        ?>
      </div>
    <?php
    }
    ?>
    <div style="border-top:1px solid #cccccc; height:1px;"></div>
  </div>


</div>
