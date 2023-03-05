<?php
/**
 * Template Name: Gallery Archive
 * 
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
use radiustheme\fmwave\inc\Helper;
get_header(); 

$query = Helper::gallery_query();

global $wp_query;
$wp_query = NULL;
$wp_query = $query;

get_template_part( 'template-parts/archive-gallery/archive', 'gallery' );

wp_reset_postdata();
