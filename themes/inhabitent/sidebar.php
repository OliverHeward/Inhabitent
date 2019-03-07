<?php
    /**
     * The sidebar containing the main widget areas
     *
     * @package RED_Starter_Theme
     */
    
    if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    	return;
    }
    ?>
<!-- Returns this as sidebar when called -->
<div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<!-- End of Sidebar -->