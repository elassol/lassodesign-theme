<!doctype html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

    <head>

        <!--=== META TAGS ===-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="description" content="Lassodesign Portfolio">  
        <meta name="author" content="Eduardo Lasso">  
        <meta name="viewport" content="width=device-width" />

        <!--=== LINK TAGS ===-->
    	
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> 
    	
        <!--=== TITLE ===--> 
        <title><?php wp_title(''); ?><?php if (!(is_404()) && (is_single()) || (is_page()) || (is_archive())) { ?> &raquo; <?php } ?><?php bloginfo('name'); ?></title>
        

        <!--=== WP_HEAD() ===-->  
        <?php wp_head(); ?>


    </head>

    <body <?php body_class(); ?>>
 
        <div id="wrapper">
            <header id="header">
                <h1 class="logo-header"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
            </header><!-- end header -->
            
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) ); ?>