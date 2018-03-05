<?php
?>

<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
<!--
<?php
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}
?>-->

        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <container class="headerContainer">
            <div><?php if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            } ?>
            </div>
            <button onClick="toggleheadermenu()" id="toggle-menu" class="toggle-menu">
            OPEN MENU
            </button>    
            <?php
                wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => false,
                        'menu_id' => 'nav-main',
                        'menu_class' => 'nav navbar-nav nav-main',
                        'fallback_cb' => 'wp_page_menu',
                        //Process nav menu using our custom nav walker
                        'walker' => new wp_bootstrap_navwalker())
                );
            ?>
            <?php
                wp_nav_menu( array(
                        'theme_location' => 'secondary',
                        'depth' => 2,
                        'container' => false,
                        'menu_id' => 'nav-secondary',
                        'menu_class' => 'nav navbar-nav nav-secondary',
                        'fallback_cb' => 'wp_page_menu',
                        //Process nav menu using our custom nav walker
                        'walker' => new wp_bootstrap_navwalker())
                );
            ?>
        </container>    

