<?php 
/* Template Name: main-template  */ 
?>
<?php get_header(); ?>
<table style="table-layout: fixed; margin: 0px auto; width: 100%">
  <tbody>
    <tr>
      <td class="left-column">
        <?php get_main_menu(); ?>
      </td>
      <td class="main-column">
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
        <?php get_right_menu();?>
      </td>
    </tr>
  </tbody>
</table>

<?php get_footer(); ?>

