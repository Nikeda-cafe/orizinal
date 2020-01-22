<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

global $usces; ?>

<?php if(!get_theme_mod( 'hide_default_menu', false ) || is_active_sidebar( 'side-widget-area3' ) ): ?>

<aside id="secondary" class="widget-area" role="complementary">

<?php if ( ! dynamic_sidebar( 'side-widget-area3' ) ) {

	//Default Welcart Calendar Widget
	$args = array(
		'before_widget' => '<section id="welcart_calendar-3" class="widget widget_welcart_calendar">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget_title">',
		'after_title' => '</h3>',
	);
	$Welcart_calendar =array(
		'title' => __('Business Calendar','usces'),
		'icon' => 1,
	);
	the_widget( 'Welcart_calendar', $Welcart_calendar, $args );	

	
} ?>

</aside><!-- #secondary -->

<?php endif; //hide_default_menu ?>