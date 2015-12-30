<?php 
/* Template Name: main-template  */ 
?>
<?php get_header(); ?>
<?php
$displayBar = 'none';
if(function_exists('isMobie') === false || (isMobie() === false)) {
  $displayBar = 'block';
}
?>
<table style="table-layout: fixed; margin: 0px auto; width: 100%">
  <tbody>
    <tr>
      <td class="left-column">
        <div class="min left-bar"></div>
        <div class="max menu-container" style="display: <?php echo $displayBar; ?>;"><?php get_main_menu(); ?></div>
      </td>
      <td class="main-column on-hide-menu">
        <?php 
        $pageid = basename(get_permalink());
        $isHome = ($GLOBALS["parentId"] === "home") ? true : false;
        
        if($isHome === true) {
          render_home();
        } else {
          render_page($pageid);
        }
        ?>
      
      </td>
      <td class="right-column">
        <div class="min right-bar"></div>
        <div class="max right-container" style="display: <?php echo $displayBar; ?>;"><?php get_right_menu();?></div>
      </td>
    </tr>
  </tbody>
</table>

<?php get_footer(); ?>
