<?php 
/* Template Name: main-template  */ 
?>
<?php get_header(); ?>
<table style="table-layout: fixed; margin: 0px auto; width: 100%">
  <tbody>
    <tr>
      <td class="left-column">
        <div class="min left-bar"></div>
        <div class="max menu-container"><?php get_main_menu(); ?></div>
      </td>
      <td class="main-column on-hide-menu">
        <?php 
        $pageid = basename(get_permalink());
        $isHome = (strcmp($pageid, "") == 0 || strcmp($pageid, "gxninhmy") == 0);
        
        if($isHome === true) {
          render_home();
        } else {
          render_page($pageid);
        }
        ?>
      
      </td>
      <td class="right-column">
        <div class="min right-bar"></div>
        <div class="max right-container"><?php get_right_menu();?></div>
      </td>
    </tr>
  </tbody>
</table>

<?php get_footer(); ?>

