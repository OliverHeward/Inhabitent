<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="footer-blocks container">
					<?php dynamic_sidebar('footer-1');?>
				<div class="footer-block-item">
					<div class="text-logo">
					</div>
				</div>
				</div>
				<div class="site-info">
					<a href="<?php echo esc_url('https://wordpress.org/'); ?>"><?php printf(esc_html('COPYRIGHT @ Inhabitent %s'), '');?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer();?>

	</body>
</html>
