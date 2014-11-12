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
</body>
</html>
