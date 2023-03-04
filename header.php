<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php bloginfo('name') ?></title>
    <link href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>" rel="icon">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header" class="fixed-top <?php if (!is_home()) : ?>header-inner-pages<?php endif; ?>">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo me-lg-0 d-flex justify-content-end">
                <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>" alt="" class="img-fluid"></a>
            </h1>

            <nav id="navbar" class="navbar mx-lg-5 text-uppercase">
                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'walker' => new WP_Bootstrap_Navwalker
                );
                ?>
                <div class="text-uppercase">
                <?php wp_nav_menu($args); ?>
                <i class="fas fa-bars mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <?php if (is_home()) : ?>
        <section id="hero" class="d-flex align-items-center justify-content-center" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/hero-bg.jpg' ?>');">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-xl-6 col-lg-8">
                        <h1 class="mt-150"><?php bloginfo('name') ?></h1>
                    </div>
                </div>
            </div>
        </section>
    <?php
    endif;
    ?>

    <main id="main">