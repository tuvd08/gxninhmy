<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
        <div style="text-align:center; width: 500px; margin:auto; position: relative;">
          <h1 class="error404-text"><?php _e( '&#272;&#432;&#417;&#768;ng d&#226;&#771;n kh&#244;ng t&#244;&#768;n ta&#803;i', 'twentythirteen' ); ?></h1>
          <h1 class="page-title"></h1>
        </div>
				
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( '&#272;&#432;&#417;&#768;ng d&#226;&#771;n na&#768;y kh&#244;ng t&#244;&#768;n ta&#803;i, ba&#803;n &#273;ang co&#769; s&#432;&#803; nh&#226;&#768;m l&#226;&#771;n v&#234;&#768; &#273;&#432;&#417;&#768;ng d&#226;&#771;n?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'Ba&#803;n co&#769; th&#234;&#777; ti&#768;m ki&#234;&#769;m th&#244;ng tin li&#234;n quan &#273;&#234;&#769;n &#273;&#432;&#417;&#768;ng d&#226;&#771;n &#273;o&#769; b&#259;&#768;ng ca&#769;ch ti&#768;m ki&#234;&#769;m. Ha&#771;y th&#432;&#777; ti&#768;m ki&#234;&#769;m ?', 'twentythirteen' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
