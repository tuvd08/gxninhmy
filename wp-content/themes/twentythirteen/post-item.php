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
