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
<?php /*
<!-- Piwik -->
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://tracking.webplatform.org/" : "http://tracking.webplatform.org/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://tracking.webplatform.org/piwik.php?idsite=3" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
*/ ?>
</body>
</html>
