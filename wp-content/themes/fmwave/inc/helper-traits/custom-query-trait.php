<?php
/**
* @author  RadiusTheme
* @since   1.0
* @version 1.0
*/

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
use radiustheme\fmwave\Helper;
use WP_Query;

trait CustomQueryTrait {

	public static function gallery_query() {
		$cpt = FMWAVE_THEME_CPT_PREFIX;
		$args = array(
			'post_type'      => "{$cpt}_gallery",
			'posts_per_page' => RDTheme::$options['gallery_archive_number'],
		);

		$orderby = '';
		switch ( RDTheme::$options['gallery_archive_orderby'] ) {
			case 'title':
			case 'menu_order':
				$orderby = RDTheme::$options['gallery_archive_orderby'];
				$order = 'ASC';
				break;
		}
		if ( $orderby ) {
			$args['orderby'] = $orderby;
			$args['order'] = $order;
		}

		if ( get_query_var('paged') ) {
			$args['paged'] = get_query_var('paged');
		}
        elseif ( get_query_var('page') ) {
			$args['paged'] = get_query_var('page');
		}
		else {
			$args['paged'] = 1;
		}

		$query = new WP_Query( $args );

		return $query;
	}

	public static function get_gallery_cat( $postID ){
		$fmwave = FMWAVE_THEME_CPT_PREFIX;
		$terms = wp_get_post_terms( $postID, "{$fmwave}_gallery_category", array( 'fields' => 'all' ) );
		if(!empty($terms)){
			foreach($terms as $index =>  $term){  ?>
                <a href="<?php echo get_category_link( $term->term_id); ?>"><?php echo esc_html( $term->name); ?></a>
				<?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "|" ) ) ?>
				<?php
			}
		}
		return;
	}

	public static function get_event_cat( $postID ){
		$fmwave = FMWAVE_THEME_CPT_PREFIX;
		$terms = wp_get_post_terms( $postID, "{$fmwave}_event_category", array( 'fields' => 'all' ) );
		if(!empty($terms)){
			foreach($terms as $index =>  $term){  ?>
                <a href="<?php echo get_category_link( $term->term_id); ?>"><?php echo esc_html( $term->name); ?></a>
				<?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "|" ) ) ?>
				<?php
			}
		}
		return;
	}

	public static function get_gallery_cat_text( $postID ){
		$fmwave = FMWAVE_THEME_CPT_PREFIX;
		$terms = wp_get_post_terms( $postID, "{$fmwave}_gallery_category", array( 'fields' => 'all' ) );
		if(!empty($terms)){
			foreach($terms as $index =>  $term){  ?>
				<?php echo esc_html( $term->name); ?>
				<?php echo esc_html( self::generate_array_iterator_postfix( $terms, $index, "|" ) ) ?>
				<?php
			}
		}
		return;
	}

	static function generate_array_iterator_postfix( $array, $index, $postfix = ', ' ) {
		$length = count($array);
		if ($length) {
			$last_index = $length - 1;
			return $index < $last_index ? $postfix : '';
		}
	}

	public static function wp_set_temp_query( $query ){
		global $wp_query;
		$temp = $wp_query;
		$wp_query = $query;
		return $temp;
	}

	public static function wp_reset_temp_query( $temp ){
		global $wp_query;
		$wp_query = $temp;
		wp_reset_postdata();
	}

	public static function set_order_orderby($rd_field){
		$orderby = '';
		$order   = 'DESC';
		switch ( RDTheme::$options[ $rd_field ] ) {
			case 'title':
			case 'menu_order':
				$orderby = RDTheme::$options[ $rd_field ];
				$order = 'ASC';
				break;
		}
		if ( $orderby ) {
			$args['orderby'] = $orderby;
			$args['order'] = $order;
		}
		return $args;
	}

	public static function set_args_orderby( $args, $rd_field ){
		$orderby = '';
		$order   = 'DESC';
		switch ( RDTheme::$options[ $rd_field ] ) {
			case 'title':
			case 'menu_order':
				$orderby = RDTheme::$options[ $rd_field ];
				$order = 'ASC';
				break;
		}
		if ( $orderby ) {
			$args['orderby'] = $orderby;
			$args['order'] = $order;
		}
		return $args;
	}

	/**
	 * for setting up pagination for custom post type
	 * we have to pass paged key
	 */
	public static function set_args_paged ($args) {
		if ( get_query_var('paged') ) {
			$args['paged'] = get_query_var('paged');
		}
        elseif ( get_query_var('page') ) {
			$args['paged'] = get_query_var('page');
		}
		else {
			$args['paged'] = 1;
		}
		return $args;
	}


	/**
	 * it will generate archive page for a post type
	 * task breakdown -
	 * 1. setting archive style,
	 * 2. adding args for custom post type,
	 * 3. make wp query & return
	 * @param  string $post_type    - post type short name eg. gallery, team, service
	 * @param  [type] $archive_style e.g: 1, 2, 3
	 * @return [type]                it will return bool
	 */
	public static function custom_query( $post_type='post', $archive_style ) {
		$fmwave = FMWAVE_THEME_CPT_PREFIX;
		$full_post_type = "{$fmwave}_{$post_type}";
		if ($post_type == 'post') {
			$full_post_type = 'post';
		}
		$archive_number = "{$post_type}_archive_number";
		$orderby_field  = "{$post_type}_archive_orderby";
		$args = array(
			'post_type'      => $full_post_type,
			'posts_per_page' => RDTheme::$options[$archive_number],
		);
		$args   = self::set_args_orderby( $args, $orderby_field);
		$args   = self::set_args_paged( $args );
		$query  = new WP_Query( $args );
		return $query;
	}


	/**
	 * 4. showing template
	 * 5. reset reset_postdata
	 * @param  [type] $post_type     [description]
	 * @param  [type] $archive_style [description]
	 * @return [type]                [description]
	 */
	public static function generate_custom_archive_page( $post_type, $archive_style ){
		RDTheme::$options["${post_type}_arc_style"] = $archive_style;
		$query = self::custom_query($post_type, $archive_style);
		global $wp_query;
		$wp_query = NULL;
		$wp_query = $query;
		get_template_part('index');
		wp_reset_postdata();
	}

}