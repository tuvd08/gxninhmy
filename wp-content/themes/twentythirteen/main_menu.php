<div class="main_menu">
  <div class="uiHomeMenu">
      <h5 class="title">Danh Mục</h5>
      
      <ul class="uiNavigations">  
      
      <?php 
        $pageid = basename(get_permalink());
        
        if(is_search()) {
          $isHome = true;
        }
        if(!$isHome) {
          $cat = get_category_by_slug($pageid);
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
      $isHome = ($isHome || strcmp($pageid, "") == 0 || strcmp($pageid, "gxninhmy") == 0);
      
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
      <li class="list-group-item" id="all"><span class="lb">Tất cả</span></li>
    </ul>
    <div style="border-top:1px solid #cccccc; height:1px;"></div>
  </div>


</div>
