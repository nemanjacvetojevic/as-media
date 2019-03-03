<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

function register_my_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'simplebar-css', get_stylesheet_directory_uri() . '/css/simplebar.css',array(), 1.000 );
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );

    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'cookie', get_stylesheet_directory_uri() . '/js/js.cookie.min.js', array('jquery') );
    wp_enqueue_script( 'menu', get_stylesheet_directory_uri() . '/js/menu.js', array(), 1.0, true );
    wp_enqueue_script( 'typer', get_stylesheet_directory_uri() . '/js/typer.js', array(), 1.0, true );
    wp_enqueue_script( 'video', get_stylesheet_directory_uri() . '/js/video.js', array(), 1.0, true );
    wp_enqueue_script( 'color', get_stylesheet_directory_uri() . '/js/color.js', array(), 1.0, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );

add_filter('wpcf7_autop_or_not', '__return_false');
/**
 * This is a modification of image_downsize() function in wp-includes/media.php
 * we will remove all the width and height references, therefore the img tag
 * will not add width and height attributes to the image sent to the editor.
 *
 * @param bool false No height and width references.
 * @param int $id Attachment ID for image.
 * @param array|string $size Optional, default is 'medium'. Size of image, either array or string.
 * @return bool|array False on failure, array on success.
 */
function myprefix_image_downsize( $value = false, $id, $size ) {
    if ( !wp_attachment_is_image($id) )
        return false;

    $img_url = wp_get_attachment_url($id);
    $is_intermediate = false;
    $img_url_basename = wp_basename($img_url);

    // try for a new style intermediate size
    if ( $intermediate = image_get_intermediate_size($id, $size) ) {
        $img_url = str_replace($img_url_basename, $intermediate['file'], $img_url);
        $is_intermediate = true;
    }
    elseif ( $size == 'thumbnail' ) {
        // Fall back to the old thumbnail
        if ( ($thumb_file = wp_get_attachment_thumb_file($id)) && $info = getimagesize($thumb_file) ) {
            $img_url = str_replace($img_url_basename, wp_basename($thumb_file), $img_url);
            $is_intermediate = true;
        }
    }

    // We have the actual image size, but might need to further constrain it if content_width is narrower
    if ( $img_url) {
        return array( $img_url, 0, 0, $is_intermediate );
    }
    return false;
}

/* Remove the height and width refernces from the image_downsize function.
 * We have added a new param, so the priority is 1, as always, and the new
 * params are 3.
 */
add_filter( 'image_downsize', 'myprefix_image_downsize', 1, 3 );
