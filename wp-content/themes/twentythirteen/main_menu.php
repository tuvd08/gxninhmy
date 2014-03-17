<div class="main_menu">
  <div class="uiHomeMenu">
      <h5 class="title">Danh Mục</h5>
      
      <ul class="uiNavigations">  
      
      <?php 
        $pageid = basename(get_permalink());
        
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
      $isHome = (strcmp($pageid, "") == 0 || strcmp($pageid, "gxninhmy") == 0);
      
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
      
  </div>


</div>
