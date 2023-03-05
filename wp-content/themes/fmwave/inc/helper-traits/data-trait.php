<?php

namespace radiustheme\fmwave;
use radiustheme\fmwave\RDTheme;
trait DataTrait {
  
  public static function socials(){
    $rdtheme_socials = array(
      'facehook_url' => array(
        'icon' => 'fab fa-facebook-f',
        'url'  => RDTheme::$options['facehook_url'],
      ),
      'twitter_url' => array(
        'icon' => 'fab fa-twitter',
        'url'  => RDTheme::$options['twitter_url'],
      ),
      'instagram_url' => array(
        'icon' => 'fab fa-instagram',
        'url'  => RDTheme::$options['instagram_url'],
      ),
      'youtube_url' => array(
        'icon' => 'fab fa-youtube',
        'url'  => RDTheme::$options['youtube_url'],
      ),
      'pinterest_url' => array(
        'icon' => 'fab fa-pinterest-p',
        'url'  => RDTheme::$options['pinterest_url'],
      ),
      'linkedin_url' => array(
        'icon' => 'fab fa-linkedin-in',
        'url'  => RDTheme::$options['linkedin_url'],
      ),
      'rss_url' => array(
        'icon' => 'fa fa-rss',
        'url'  => RDTheme::$options['rss_url'],
      ),
    );
    return array_filter( $rdtheme_socials, array( __CLASS__ , 'filter_social' ) );
  } 

  public static function filter_social( $args ){
    return ( $args['url'] != '' );
  }

	public static function team_socials(){
		$team_socials = array(
			'facebook' => array(
				'label' => esc_html__( 'Facebook', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-facebook-f',
			),
			'twitter' => array(
				'label' => esc_html__( 'Twitter', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-twitter',
			),
			'linkedin' => array(
				'label' =>esc_html__( 'Linkedin', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-linkedin-in',
			),
			'youtube' => array(
				'label' =>esc_html__( 'Youtube', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-youtube',
			),
			'pinterest' => array(
				'label' =>esc_html__( 'Pinterest', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-pinterest-p',
			),
			'instagram' => array(
				'label' =>esc_html__( 'Instagram', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-instagram',
			),
			'sundcloud' => array(
				'label' =>esc_html__( 'Sound cloud', 'fmwave' ),
				'type'  => 'text',
				'icon'  => 'fa-soundcloud',
			),
		);

		return apply_filters( 'team_socials', $team_socials );
	}

}

