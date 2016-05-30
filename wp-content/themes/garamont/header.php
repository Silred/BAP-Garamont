<?php
/**
 * Created by PhpStorm.
 * User: debray
 * Date: 03/03/2016
 * Time: 00:39
 */

?>

<!DOCTYPE html>

<html>

<head>
<title><?php bloginfo('name') ?></title>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/unslider.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/animate.css" type="text/css"/>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.12.1.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
</head>




<body <?php body_class("class"); ?>>

<nav class="navbar  navbar-inverse  navbar-static-top  header-nav" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <?php
        wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => false,
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
        );
        ?>
        </div>
    </div>
</nav>


<div class="sidebar">

    <?php
    $args = array( 'post_type' => 'social', 'posts_per_page' => 4 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();?>

        <a href="<?php the_field('lien')?>">

            <?php
            the_post_thumbnail( array(50, 50), array( 'class' => 'img-responsive  img-circle' ));
            ?>

        </a>

    <?php
    endwhile;
    ?>

</div>



<div class="container-fluid" id="page">
