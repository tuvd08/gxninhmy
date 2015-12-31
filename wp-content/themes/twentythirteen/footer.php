<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<div class="copyright">
					<div><span style="color: rgb(0, 0, 51);">
						<strong>TRANG TIN ĐIỆN TỬ GIÁO XỨ NINH MỸ - GIÁO PHẬN BÙI CHU. </strong><br>
						<strong>Phụ trách:</strong> </span>
						<span style="color:rgb(255, 0, 0);"><strong>Văn phòng Ban Thông Tin Giáo Xứ Ninh Mỹ&nbsp;&nbsp;- Giáo Phận Bùi Chu.</strong></span><br>
						<span style="color: rgb(0, 0, 51);"><strong>Địa chỉ: </strong>, &nbsp;Ninh Mỹ - Xã Hải Giang - Huyện Hải Hậu - Nam Định.<br>
						<strong>Tel:</strong> +84 (09) 77 608 139&nbsp;</span><span style="color:rgb(0, 0, 51);"> - <strong>Email:</strong>&nbsp;</span><a href="mailto:gxninhmy@gmail.com"><span style="color:rgb(0, 0, 0);">gxninhmy@gmail.com</span></a><span style="color:rgb(0, 0, 0);">&nbsp;&nbsp;</span>-&nbsp;<span style="color:rgb(0, 0, 0);">info@ninhmy.net</span><br/>
						<strong>website:</strong><a href="http://ninhmy.net">www.ninhmy.net &nbsp;</a> &nbsp;<strong>Facebook:</strong>&nbsp;<a href="https://facebook.com/ninhmy.net">https://www.facebook.com/ninhmy.net</a>
					</div>
					<div>
						<span style="color: rgb(0, 0, 51);">Copyright © 2006 - 2014 </span><strong><a href="http://www.ninhmy.net/"><span style="color:rgb(255, 0, 0);">TRANG TIN ĐIỆN TỬ GIÁO XỨ NINH MỸ - GIÁO PHẬN BÙI CHU &nbsp;</span></a></strong><span style="color: rgb(0, 0, 51);">&nbsp;All Rights Reserved.</span>
						<br>Powered by <strong>Ban Thông Tin Giáo Xứ &nbsp;Ninh Mỹ</strong>
					</div>
				</div>
			</div>
		</footer>
<!-- #colophon -->
	</div><!-- #page -->
	<div id="slider-image-display" style="display:none"></div>
<div class="bodyMarkLayer">
   <div title="Click here to stop this action." class="uiLoadingIcon"></div>
</div>
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>/static.php?f=Load.callBack" type="text/javascript"></script>
	<script type="text/javascript">
		window.pageid = '<?php echo $GLOBALS["pageid"]; ?>';
		window.parentId = '<?php echo $GLOBALS["parentId"]; ?>';
	</script>
	<?php wp_footer(); ?>
</div>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main-base.js" type="text/javascript"></script>
</body>
</html>

<?php include 'end_caching.php'; ?>
