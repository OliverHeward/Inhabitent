<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes($classes) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if (is_multi_author()) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter('body_class', 'red_starter_body_classes');

/*
 * - Function to change the WordPress logo on login form to Inhabitent SVG logo.
 * - Button background color change to company 'green' color
 * - BackToBlog link and link:hover change to company colours
 * - Forgot Password link and link:hover change to company colours (reverse)
 */
function inhabitent_login_logo() {?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/images/logos/inhabitent-logo-text-dark.svg);
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>

    <style type="text/css">
    body.login div#login form#loginform p.submit, body.login div#login form#loginform p.submit input#wp-submit {
    	background-color: #248A83;
    }
</style>

	<style type="text/css">

	body.login div#login p#backtoblog a {
		color: #248A83;
	}

	body.login div#login p#backtoblog a:hover {
		color: #d99054;
	}

	body.login div#login p#nav a {
		color: #d99054;
	}

	body.login div#login p#nav a:hover {
		color: #248a83;
	}
</style>
<?php }
add_action('login_enqueue_scripts', 'inhabitent_login_logo');

/*
 * Customize URL that the logo points too from WordPress to our Inhabitent Website
 */

function inhabitent_login_logo_url() {
	return home_url();
}
add_filter('login_headerurl', 'inhabitent_login_logo_url');
