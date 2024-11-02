<?php get_header(); ?>

<div class="container h-auto single-project-wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="row" id="post-<?php the_ID(); ?>" <?php post_class('single-project'); ?>>
            <div class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
               
            </div>

            <div class="entry-content single-pro-wrap">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="project-thumbnail">
                        
                        <?php 
                          $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
                          <img class="bannerimg-prop-single" src="<?php echo $featured_img_url ?>" alt="">
                    </div>
                <?php endif; ?>
                <div class="entry-meta">
                    <span class="posted-on">Published on <?php echo get_the_date(); ?></span>
                    <span class="byline"> by <?php the_author(); ?></span>
                </div>
                <div class="single-pro-wrap-content">
                  <?php the_content(); ?>
                </div>
            </div>

            <div class="entry-footer">
                </div>
        </article>
        
        <div class="navigation row">
            <?php
            the_post_navigation(array(
                'prev_text' => __('Previous Project: %title', 'textdomain'),
                'next_text' => __('Next Project: %title', 'textdomain'),
            ));
            ?>
        </div>

    <?php endwhile; else : ?>
        <p><?php _e('No project found.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>

<!-- <?php get_footer(); ?> -->
