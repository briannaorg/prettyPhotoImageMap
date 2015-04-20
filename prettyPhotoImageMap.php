<?php
/*
Plugin Name: Pretty Photo Image Map Support 
Plugin URI: http://technosiren.com
Description: Adds <area> support to prettyPhoto Lightboxes
Version: 1.0
Author: Brianna Privett
Author URI: http:technosiren.com
Text Domain: sinopia
*/

/*  Copyright 2015 TechnoSiren  (email : song@technosiren.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function check_for_shortcode($posts) {
    if ( empty($posts) )
        return $posts;
 
    // false because we have to search through the posts first
    $found = false;
 
    // search through each post
    foreach ($posts as $post) {
        // check the post content for the short code
        if ( stripos($post->post_content, '[prettyPhotoImageMap') )
            // we have found a post with the short code
            $found = true;
            // stop the search
            break;
        }
 
    if ($found){
        // $url contains the path to your plugin folder
        $url = plugin_dir_url( __FILE__ );
        wp_enqueue_script('prettyPhotoImageMap', $url . 'prettyPhotoImageMap.js', array( 'jquery' )); 
    }
    return $posts;
}
// perform the check when the_posts() function is called
add_action('the_posts', 'check_for_shortcode');


function pretty_photo_image_map() {
	echo '';
}

function register_shortcodes(){
   add_shortcode('prettyPhotoImageMap', 'pretty_photo_image_map');
}

add_action( 'init', 'register_shortcodes');