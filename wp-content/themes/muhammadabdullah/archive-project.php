<?php get_header(); ?>

<div class="container archive-project-container h-auto">
    <!-- <h1 class="page-title"><?php post_type_archive_title(); ?></h1> -->

    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
                            
                            <div class="row">
                                <div class="col-6">
                                    <!-- Start date -->
                                     <h3>Start Date :
                                     <?php 
                                        $start_date = get_field('project_start_date');
                                        if($start_date){ ?>
                                            <p class="acf-content"> <?php echo esc_html($start_date) ?></p>
                                        <?php }
                                        else{ ?> 
                                        <p></p>
                                        <?php }
                                    ?>
                                     </h3>
                                    
                                    <!-- Start date -->
                                </div>
                                <div class="col-6">
                                <h3>End Date :
                                    <!-- End date -->
                                    <?php 
                                    $end_date = get_field('project_end_date');
                                    if($end_date){ ?>
                                        <p class="acf-content"> <?php echo esc_html($end_date) ?></p>
                                    <?php }
                                    else{ ?> 
                                    <p></p>
                                    <?php }
                                    ?>
                                    <!-- End date -->     
                                </h3>
                                   
                                </div>
                            </div>
                              
                             
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'textdomain'),
                'next_text' => __('Next', 'textdomain'),
            ));
            ?>
        </div>

    <?php else : ?>
        <p><?php _e('No projects found.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
