<?php get_header(); ?>

<div class="container">
    <!-- <h1 class="page-title"><?php bloginfo('name'); ?></h1> -->

    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
            <div class="blog-wrapper  col-lg-4 col-md-6 col-sm-12 mb-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="post-image-card" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>
                        <header class="entry-header w-auto">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                        </header>
                        <div class="card-content entry-content">
                                <?php the_excerpt(); ?>
                        </div>
                    </article>
                        </div>        
            <?php endwhile; ?>
        </div>

    <?php else : ?>
        <p><?php _e('No content found.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
