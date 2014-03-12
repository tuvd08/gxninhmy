<div class="home-page">
<?php
$categories = array("ha-giai-nha-tho","thuong-vi-nha-tho","thu-ngo");
foreach($categories as $cate) {
  $strQuery = array( 'posts_per_page' => 5, 'category_name' => $cate, 'orderby' => 'date' );
  $the_query = new WP_Query( $strQuery );
  $category = get_category_by_slug($cate);
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
?>
    <div class="the-post">
      <div class="the-title">
        <a href=""><?php the_title(); ?></a>
      </div>
    
    </div>
<?php
    }
?>

    </div>
  </div>

<?php } ?>
</div>
