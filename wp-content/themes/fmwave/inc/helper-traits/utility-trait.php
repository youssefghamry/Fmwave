<?php

namespace radiustheme\fmwave;

trait UtilityTrait {
  
  public static function rt_get_post_meta($data, $post_id ) { 
   $post_meta_holder= "";
      $comments_number = number_format_i18n( get_comments_number($post_id) );
      $comments_html   = $comments_number < 2 ? esc_html__( 'Comment' , 'fmwave' ) : esc_html__( 'Comments' , 'fmwave' );
      $comments_html  .= ': '. $comments_number;  
    ?>
   
    <?php 
  
      if ( $data['meta']  == 'yes' ): 
        ?>   
          <?php if ( RDTheme::$options['blog_date'] ):      
           ?>         
          <ul class="entry-meta">
            <li><?php echo esc_html__( 'by' , 'fmwave' ); ?> <span class="vcard author"><?php the_author_posts_link();?></span></li>
            <li><?php echo wp_kses_stripslashes( $comments_html );?></li>
          </ul>
      <?php endif; ?>   
    <?php endif ;
  
     return $post_meta_holder;
  }

  public static function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);
    if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
    }
    $rgb = "$r, $g, $b";
    return $rgb;
  }

  public function rt_loadmore_single_department() {
    $html = null;
    $remaining = true;
    $fmwave      = FMWAVE_CORE_THEME;
    $cpt         = FMWAVE_CORE_CPT;
    $thumb_size  = "{$fmwave}-size3";   
  
    $args = array(
    'post_type'       => "{$cpt}_departments",
    'post_status'     => 'publish',
    'p'             => 42,    
    );        
    $query = new WP_Query( $args );
    $temp = Helper::wp_set_temp_query( $query );

    if ( $query->have_posts() ) :
      if($query->max_num_pages == $page){
        $remaining = false;
      }
    ob_start();     
    
    else:
      $remaining = false;
    endif;
    $html = ob_get_clean();
    $var = $_POST;
         
    wp_send_json( compact('html', 'page', 'remaining', 'query'));
  }

  public static function get_departments(){
    $fmwave = FMWAVE_THEME_PREFIX_VAR;
    $departments = array();
    $args = array(
      'posts_per_page'   => -1,
      'orderby'          => 'title',
      'order'            => 'ASC',
      'post_type'        => "{$fmwave}_departments",
    );  
    $posts = get_posts( $args );      
    foreach ( $posts as $post ) {
      $departments[$post->ID] = $post->post_title;
    }
    return $departments;
  }

   static function is_under_construction_mode () {
     if ( ! class_exists( 'ReduxFramework' ) ) {
       return false;
     }
     $mode   = RDTheme::$options['under_construction_mode_enable'] ;
     if ( is_user_logged_in() || 'off' === $mode ) {
       return false;
     }
     return true;
   }

}

