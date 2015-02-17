<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->
</div><!-- #page -->

<footer id="mw-footer">
	<div class="container">
		<span id="footer-title">WebPlatform<span id="footer-title-light">.org</span></span>
		<div id="site-generator">
			<?php do_action( 'twentyeleven_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyeleven' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyeleven' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'twentyeleven' ), 'WordPress' ); ?></a>
		</div>
	<?php wp_footer(); ?>
	</div>
</footer>
<?php if ( isset($GLOBALS['wpd']['piwik_id']) && $GLOBALS['wpd']['piwik_id'] > 0 ) { ?>
	<!-- Piwik -->
	<script type="text/javascript">
		var _paq = _paq || [];
		_paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
		_paq.push(["setCookieDomain", "*.<?php echo $GLOBALS['siteTopLevelDomain']; ?>"]);
		_paq.push(['trackPageView']);
		_paq.push(['enableLinkTracking']);
		(function() {
			var u="https://stats.<?php echo $GLOBALS['siteTopLevelDomain']; ?>/";
			_paq.push(['setTrackerUrl', u+'piwik.php']);
			_paq.push(['setSiteId', <?php echo $GLOBALS['wpd']['piwik_id']; ?>]);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		})();
	</script>
	<noscript><p><img src="https://stats.<?php echo $GLOBALS['siteTopLevelDomain']; ?>/piwik.php?idsite=<?php echo $GLOBALS['wpd']['piwik_id']; ?>" style="border:0;" alt="" /></p></noscript>
	<!-- End Piwik Code -->
<?php } ?>
</body>
</html>
