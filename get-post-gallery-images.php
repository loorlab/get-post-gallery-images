<?php
/*
Plugin Name: Get Post Gallery Images
Description: Used to fetch images from your posts galleries to display as part of the excerpt.
Tags: future, upcoming posts, upcoming post, upcoming, draft, Post, scheduled, preview
Author: Sierj Khaletski
Version: 0.1
*/

/**
 * Get Image from Post core file
 *
 * This file contains all the logic required for the plugin
 *
 * @package         Get Post Gallery Images
 * @copyright       Copyright (c) 2013, Sierj Khaletski
 * @license         http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since           Get Post Gallery Images 0.1
 */

function get_post_gallery_images() {
    $attachment_ids = array();
    $pattern = get_shortcode_regex();
    $images = array();
    if (preg_match_all( '/'. $pattern .'/s', get_the_content(), $matches ) ) {
        //finds the "gallery" shortcode and puts the image ids in an associative array at $matches[3]
        $count = count($matches[3]);      //in case there is more than one gallery in the post.
        for ($i = 0; $i < $count; $i++){
            $atts = shortcode_parse_atts( $matches[3][$i] );
            if ( isset( $atts['ids'] ) ){
                $attachment_ids = explode( ',', $atts['ids'] );
                $attachementsCount = count($attachment_ids);
                if ($attachementsCount > 0){
                    for ($j = 0; $j < $attachementsCount ; $j++) { 
                        $image = array();
                        $attachmentId = intval($attachment_ids[$j]);
                        $image['id'] = $attachmentId;
                        $image['full'] = wp_get_attachment_image_src($attachmentId, 'full');
                        $image['medium'] = wp_get_attachment_image_src($attachmentId, 'medium');
                        $image['thumbnail'] = wp_get_attachment_image_src($attachmentId, 'thumbnail');
                        array_push($images, $image);
                    }
                }
            }
        }
    }
    return $images;
}
