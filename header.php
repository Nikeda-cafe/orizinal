<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="format-detection" content="telephone=no"/>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">

	<?php wp_head(); ?>
<?php if( get_theme_mod( 'gsc_tag_settings', true ) ): ?>
	<?php 
    $gsc_tag = get_theme_mod( 'gsc_tag_settings', true );
    $gsc_tag = trim($gsc_tag);
	?>
<meta name="google-site-verification" content="<?php echo $gsc_tag; ?>" />
<?php endif; ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="inner cf">

			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
			<?php 
                if (has_custom_logo()) : //カスタムロゴがある場合はロゴを表示 ?>
                    <<?php echo $heading_tag; ?> class="site-title logo"><?php the_custom_logo(); ?></<?php echo $heading_tag; ?>>
                <?php else: //ロゴがない場合はサイト名を表示 ?>
                <<?php echo $heading_tag; ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $heading_tag; ?>>
            <?php  endif; ?>

			<?php if(! welcart_basic_is_cart_page()): ?>
			
			<div class="snav cf">

        <?php if(!get_theme_mod( 'welcart_menu_header_disable', false )): ?>

				<div class="search-box">
					<i class="fa fa-search"></i>
					<?php get_search_form(); ?>
				
				</div>
        
                <div class="incart-btn">
					<a href="<?php echo USCES_CART_URL; ?>"><i class="fa fa-shopping-cart"><span></span></i><?php if(! defined( 'WCEX_WIDGET_CART' ) ): ?><span class="total-quant"><?php usces_totalquantity_in_cart(); ?></span><?php endif; ?></a>
				</div>

				<?php if(usces_is_membersystem_state()): ?>
				<div class="membership">
					<i class="fa fa-user"></i>
					<ul class="cf">
						<?php if( usces_is_login() ): ?>
							<li><?php printf(__('Hello %s', 'usces'), usces_the_member_name('return')); ?></li>
							<li><?php usces_loginout(); ?></li>
							<li><a href="<?php echo USCES_MEMBER_URL; ?>"><?php _e('My page', 'welcart_basic') ?></a></li>
						<?php else: ?>
							<li><?php _e('guest', 'usces'); ?></li>
							<li><?php usces_loginout(); ?></li>
							<li><a href="<?php echo USCES_NEWMEMBER_URL; ?>"><?php _e('New Membership Registration','usces') ?></a></li>
						<?php endif; ?>
					</ul>
				</div>

        <?php endif; //welcart_menu_header_disable ?>
			<?php endif; //welcart_basic_is_cart_page() ?>

			</div><!-- .snav -->

			<?php endif; ?>
			<p class="site-description-desktop"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .inner -->

		<?php if(! welcart_basic_is_cart_page()): ?>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<label for="panel"><span></span></label>
			<input type="checkbox" id="panel" class="on-off" />
			<?php 
				$page_c	=	get_page_by_path('usces-cart');
				$page_m	=	get_page_by_path('usces-member');
				$pages	=	"{$page_c->ID},{$page_m->ID}";
				wp_nav_menu( array( 'theme_location' => 'header', 'container_class' => 'nav-menu-open' , 'exclude' => $pages ,  'menu_class' => 'header-nav-container cf' ) );
			?>
		</nav><!-- #site-navigation -->
		
		<?php endif; ?>

	</header><!-- #masthead -->

	<?php if( is_front_page() && get_header_image() ): ?>
	<div class="main-image">
    <!-- スライドショーのコードをここより下に貼り付け⬇ -->
        <?php include_once(ABSPATH.'wp-admin/includes/plugin.php'); ?>
        <?php if( get_theme_mod( 'shortcode', true ) && is_plugin_active('smart-slider-3/smart-slider-3.php') ): //スライダーIDが設定されており、かつプラグインが有効な場合?>
        <?php
            $value = get_theme_mod( 'shortcode', true );
            $value = trim($value);
        
            if( is_numeric($value) ){
                echo do_shortcode('[smartslider3 slider=' . $value .']');
            }else{
                echo "<p>スライダーを表示するためには「カスタマイズ」からスライダーIDを設定してください。</p>";
            }
        ?>
        <?php else: //それ以外?>
        
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>">
        
        <?php endif; ?>
    <!-- ⬆スライドショーここまで⬆  -->
	</div><!-- main-image -->
	<?php endif; ?>

    <!-- パンくずリスト -->
		<div class="breadcrumbs">
        <?php if(function_exists('bcn_display')){
        bcn_display();
        }?>
        </div>
    <!-- ⬆パンくずリスト⬆  -->
	
	<?php 
		if( is_front_page()  || welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) {
			$class = 'one-column';	
		}else {
			$class = 'two-column right-set';
		};
	?>
	
	<div id="main" class="wrapper <?php echo $class;?>">