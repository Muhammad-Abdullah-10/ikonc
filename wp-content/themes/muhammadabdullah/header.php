<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<header>
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
                <?php else : ?>
                    <h1 class="site-name"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav ms-auto',
                        'add_li_class'  => 'nav-item', // For main menu items
                        'link_class' => 'nav-link',     // For main menu links
                    ));
                    ?>
            
            </div>
         </div>
        </nav>
    </div>
</header>
