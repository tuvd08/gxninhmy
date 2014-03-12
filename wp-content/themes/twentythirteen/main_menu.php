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
      foreach( $pages as $p ) {
        $clazz = "navItem";
        if(strcmp($p -> post_name, $pageid) == 0 || $isHome === true && strcmp($p -> post_name, "home") == 0) {
          $clazz = "navItemSelected";
        }
        
        echo '<li class="'. $clazz .'">';
        echo '  <a href="'. site_url() .'/' . $p -> post_name . '">'. $p->post_title .'</a>';
        echo '</li>';
      }
      
      ?>
    </ul>
      
  </div>


</div>
