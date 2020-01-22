<?php

/***********************************************************
* setup theme_customizer
***********************************************************/
function welcart_basic_customize_register( $wp_customize ) {

	/* Remove Section
	------------------------------------------------------*/
	$wp_customize->remove_section( 'nav' );

	/* Theme Options
	------------------------------------------------------*/
	$wp_customize->add_section( 'welcart_basic_design', array(
		'title'		=> __('Theme Options' , 'welcart_basic'),
		'priority'	=> 100,
	) );

	/* Home Product List category */
	$cat = get_category_by_slug( 'item' );
	$categories = get_categories( 'child_of='.$cat->term_id );
	$cats = array();
	foreach( $categories as $category ) {
		$cats[$category->slug] = $category->name;
	}
	$h_itemcat = get_theme_mod( 'h_itemcat', 'itemreco' );
	$h_itemnum = get_theme_mod( 'h_itemnum', '10' );

	$wp_customize->add_setting( 'welcart_basic_h_itemcat', array(
		'default'			=> $h_itemcat,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	));
	$wp_customize->add_control( 'h_itemcat', array(
		'label'				=> __('Home Product List category', 'welcart_basic'),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'welcart_basic_h_itemcat',
		'type'				=> 'select',
		'choices'			=> $cats,
		'active_callback'	=> 'callback_is_front_page',
		'priority'			=> 111,
	));

	/* Home Product List number */
	$wp_customize->add_setting( 'welcart_basic_h_itemnum', array(
		'default'			=> $h_itemnum,
		'type'				=> 'option',
		'capability'		=> 'edit_theme_options',
	));
	$wp_customize->add_control( 'h_itemnum', array(
		'label'				=> __('Home Product List number', 'welcart_basic'),
		'section'			=> 'welcart_basic_design',
		'settings'			=> 'welcart_basic_h_itemnum',
		'type'				=> 'number',
		'input_attrs'		=> array('min' => '1'),
		'active_callback'	=> 'callback_is_front_page',
		'priority'			=> 121,
	));

	/* Callback
	------------------------------------------------------*/
	function callback_is_front_page() {
		return 'posts' == get_option( 'show_on_front' ) && ( is_home() || is_front_page() );
	}

	/* Change header nav color
	------------------------------------------------------*/
	$wp_customize->add_section( 'colors', array(
		'title'     => '色', // 項目名
		'priority'  => 50, // 優先順位
	));

	$wp_customize->add_setting( 'header_nav_color', array(
		'default' => '#131313',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_color', array(
		'label' => 'ヘッダーナビゲーション色',
		'section' => 'colors',
		'settings' => 'header_nav_color',
		'priority' => 20,
	)));

	/* Change header nav color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'header_nav_hover_color', array(
		'default' => '#565656',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_hover_color', array(
		'label' => 'ヘッダーナビゲーションホバー色',
		'section' => 'colors',
		'settings' => 'header_nav_hover_color',
		'priority' => 20,
	)));

	/* Change header nav link color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'header_nav_link_color', array(
		'default' => '#ffffff',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_link_color', array(
		'label' => 'ヘッダーナビゲーションリンク色',
		'section' => 'colors',
		'settings' => 'header_nav_link_color',
		'priority' => 20,
	)));

	/* Change header nav link hover color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'header_nav_link_hover_color', array(
		'default' => '#ffffff',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_link_hover_color', array(
		'label' => 'ヘッダーナビゲーションリンクホバー色',
		'section' => 'colors',
		'settings' => 'header_nav_link_hover_color',
		'priority' => 20,
	)));

	/* Change header nav border color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'header_nav_border_color', array(
		'default' => '#666666',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_border_color', array(
		'label' => 'ヘッダーナビゲーションボーダー色',
		'section' => 'colors',
		'settings' => 'header_nav_border_color',
		'priority' => 20,
	)));

	/* Change header nav current color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'header_nav_current_color', array(
		'default' => '#565656',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_nav_current_color', array(
		'label' => 'ヘッダーナビゲーション選択時色',
		'section' => 'colors',
		'settings' => 'header_nav_current_color',
		'priority' => 20,
	)));

	/* Change footer color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'footer_color', array(
		'default' => '#131313',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_color', array(
		'label' => 'フッター色',
		'section' => 'colors',
		'settings' => 'footer_color',
		'priority' => 20,
	)));

	/* Change footer text color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'footer_text_color', array(
		'default' => '#ffffff',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'label' => 'フッターテキスト色',
		'section' => 'colors',
		'settings' => 'footer_text_color',
		'priority' => 20,
	)));
    
    /* Change Description Color
	------------------------------------------------------*/

	$wp_customize->add_setting( 'description_color', array(
		'default' => '#ffffff',
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'description_color', array(
		'label' => 'モバイル時キャッチフレーズ文字色',
		'section' => 'colors',
		'settings' => 'description_color',
		'priority' => 20,
	)));
    
    /* Smart Slider
	------------------------------------------------------*/
    $wp_customize->add_section( 'slider', array (
        'title' => 'スライダー',
        'priority' => 999,
    ));

    //メタキーワード
    $wp_customize->add_setting( 'shortcode', array (
        'default' => null,
    ));
    $wp_customize->add_control( 'shortcode', array(
        'section' => 'slider',
        'settings' => 'shortcode',
        'label' =>'スライダーIDの設定',
        'description' => 'Smart SliderのスライダーIDを数値で入力してください。',
        'type' => 'text',
        'priority' => 70,
    ));

    /* Welcart Header Menu（ヘッダーメニューを表示しない選択）
    ------------------------------------------------------*/
    // Disable Header Menu
    $wp_customize->add_section( 'welcart_header', array (
        'title' => 'Welcartヘッダーメニュー',
        'priority' => 998,
    ));

    $wp_customize->add_setting( 'welcart_menu_header_disable',
        array(
            // 'sanitize_callback' => 'welcart_sanitize_checkbox',
            'default'           => '',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control( 'welcart_menu_header_disable',
        array(
            'type'        => 'checkbox',
            'label'       => 'ヘッダーのWelcartメニューを表示しない',//esc_html__('Welcartヘッダーメニューを表示しない', 'welcart')
            'description' => 'ヘッダーのWelcartメニューを非表示にします。',
            'section'     => 'welcart_header'
        )
    );

    /* Hide Default Widget（初期状態のウィジェットに何も表示させない）
    ------------------------------------------------------*/
    // Hide Default Widget
    $wp_customize->add_section( 'widget_hide', array (
        'title' => '初期ウィジェットの非表示',
        'priority' => 997,
    ));

    $wp_customize->add_setting( 'hide_default_menu',
        array(
            // 'sanitize_callback' => 'welcart_sanitize_checkbox',
            'default'           => '',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control( 'hide_default_menu',
        array(
            'type'        => 'checkbox',
            'settings' => 'hide_default_menu',
            'label'       => '初期ウィジェットを表示しない',//esc_html__('Welcartヘッダーメニューを表示しない', 'welcart')
            'description' => 'トップページとサイドバーにはじめから表示されているウィジェットを非表示にします。',
            'section'     => 'widget_hide'
        )
    );

    /* Google Search ConsoleのHTMLタグ
    ------------------------------------------------------*/
    // Google Search Console
    $wp_customize->add_section( 'gsc_tag', array (
        'title' => 'Google Search Console',
        'priority' => 998,
    ));

    $wp_customize->add_setting( 'gsc_tag_settings',
        array(
            // 'sanitize_callback' => 'welcart_sanitize_checkbox',
            'default'           => '',
            'transport' => 'postMessage',
        )
    );
    $wp_customize->add_control( 'gsc_tag_settings',
        array(
            'type'        => 'text',
            'settings' => 'gsc_tag_settings',
            'label'       => 'Google Search Consoleのサイト認証タグ',//esc_html__('Welcartヘッダーメニューを表示しない', 'welcart')
            'description' => 'Google Search Consoleのサイト認証IDを入力します',
            'section'     => 'gsc_tag'
        )
    );


	/* Change background color
	------------------------------------------------------*/

	// $wp_customize->add_setting( 'site_background_color', array(
	// 	'default' => '#ffffff',
	// ));
	//
	// $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_background_color', array(
	// 	'label' => 'サイト背景色',
	// 	'section' => 'colors',
	// 	'settings' => 'site_background_color',
	// 	'priority' => 19,
	// )));

}
add_action( 'customize_register', 'welcart_basic_customize_register' );

function welcart_basic_posts_per_page( $query ) {
	if( is_admin() || !$query->is_main_query() ) {
		return;
	}

	if( 'posts' == get_option( 'show_on_front' ) && ( $query->is_home() || $query->is_front_page() ) ) {
		$h_itemcat = get_option( 'welcart_basic_h_itemcat' );
		$h_itemnum = get_option( 'welcart_basic_h_itemnum' );
		if( empty($h_itemcat) ) $h_itemcat = 'itemreco';
		if( empty($h_itemnum) ) $h_itemnum = '10';
		$query->set( 'category_name', $h_itemcat );
		$query->set( 'posts_per_page', $h_itemnum );
		$query->set( 'post__not_in', array() );
		return;
	}
}
add_action( 'pre_get_posts', 'welcart_basic_posts_per_page' );


/* Change Color
	------------------------------------------------------*/
function customizer_color() {
	$header_nav_color = get_theme_mod( 'header_nav_color', '#131313');
	$header_nav_hover_color = get_theme_mod( 'header_nav_hover_color', '#565656');
	$header_nav_link_color = get_theme_mod( 'header_nav_link_color', '#ffffff');
	$header_nav_link_hover_color = get_theme_mod( 'header_nav_link_hover_color', '#ffffff');
	$header_nav_border_color = get_theme_mod( 'header_nav_border_color', '#666666');
	$header_nav_current_color = get_theme_mod( 'header_nav_current_color', '#565656');
	$footer_color = get_theme_mod( 'footer_color', '#131313');
	$footer_text_color = get_theme_mod( 'footer_text_color', '#131313');
	$background_color = get_theme_mod( 'background_color', '#ffffff');
    $description_color = get_theme_mod( 'description_color', '#ffffff');
  ?>
	<style type="text/css">
 	/* ヘッダーナビゲーション */
	header div.header-nav-container, .site-description, div.nav-menu-open {
		background-color: <?php echo $header_nav_color; ?> !important;
	}

	#site-navigation li a:hover{
		color:<?php echo $header_nav_link_hover_color; ?>;
		background-color: <?php echo $header_nav_hover_color; ?>;
	}

	#site-navigation li a{
		color: <?php echo $header_nav_link_color; ?>;
	}

	#site-navigation ul li:first-child{
		    border-left: 1px solid <?php echo $header_nav_border_color; ?>;
	}

	#site-navigation ul li{
		    border-right: 1px solid <?php echo $header_nav_border_color; ?>;
	}

	#site-navigation li.current_page_item a{
		background-color: <?php echo $header_nav_current_color; ?>;
	}
        
    #site-navigation li.current-menu-item a, #site-navigation li.current-menu-parent a {
		background-color: <?php echo $header_nav_current_color; ?>;
	}
        
    .site-description{
        color: <?php echo $description_color; ?>; 
    }    

	/* フッター */
	footer{
		background-color: <?php echo $footer_color; ?>;
		color: <?php echo $footer_text_color; ?> ;
	}

	/* サイトキー色 */
	div.cart_navi li.current, div.cart_navi li.current:before, div.cart_navi li.current:after, .widget_welcart_calendar th {
		background-color: <?php echo $header_nav_color; ?>;
		color: <?php echo $header_nav_link_color; ?>;
	}

	/*body{
		background-color: <?php echo get_theme_mod('site_background_color'); ?>;
	}*/
	</style>
	<?php
}
add_action( 'wp_head', 'customizer_color');
