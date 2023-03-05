<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\fmwave;
$nav_menu_args   = Helper::nav_menu_args();

$rdtheme_logo  =  empty(  RDTheme::$options['logo'] ) ? '<img width="398" height="127" class="logo-small" alt="'.get_bloginfo( 'name' ).'" src="'.Helper::get_img( 'logo-dark.png' ).'">' :  wp_get_attachment_image(RDTheme::$options['logo'],'full',"", array( "class" => "logo-small" ));
?>

<div class="rt-header-menu mean-container" id="meanmenu"> 
    <div class="mean-bar">
    	<a href="<?php echo esc_url(home_url('/'));?>"><?php echo wp_kses( $rdtheme_logo, 'alltext_allow' ); ?></a>
		<?php if ( RDTheme::$options['header_search'] || RDTheme::$options['header_button'] ){ ?>
		<div class="header-action-layout1">
			<ul>
				<?php if ( RDTheme::$options['header_search'] == 1 ) { ?>
				<li class="search-icon">
					<a href="#header-search" title="<?php esc_attr_e('Search', 'fmwave') ?>">
						<i class="fas fa-search"></i>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
        <span class="sidebarBtn ">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </span>
    </div>

    <div class="rt-slide-nav">
        <div class="offscreen-navigation">
            <?php wp_nav_menu( $nav_menu_args );?>
        </div>
    </div>

</div>
