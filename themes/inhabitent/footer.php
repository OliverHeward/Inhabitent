<?php
    /**
     * The template for displaying the footer.
     *
     * @package RED_Starter_Theme
     */
    
    ?>
</div><!-- End of Page Content -->
<!-- Start of Footer -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <!-- Footer Blocks - PHP call for the Registered Sidebar -->
    <div class="footer-blocks container">
        <?php dynamic_sidebar('footer-1');?>
    </div>
    <!-- End of Footer Blocks -->
    <!-- Start of Site Info -->
    <div class="site-info">
        <a href="<?php echo esc_url('https://wordpress.org/'); ?>"><?php printf(esc_html('COPYRIGHT @ Inhabitent %s'), '');?></a>
    </div>
    <!-- End of Site Info -->
</footer>
<!-- End of Footer -->
</div>
<!-- End of Page -->
<?php wp_footer();?> <!-- Export Footer -->
</body> <!-- End of Body -->
</html> <!-- End of HTML -->