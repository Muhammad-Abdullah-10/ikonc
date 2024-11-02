<?php
get_header();
?>
<!-- Background image -->
<div class="wrapper-main-banner">
    <div class="overlay"></div>
    <h2 class="">
        Main Page Banner
    </h2>
    <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
    molestiae quas vel sint commodi repudiandae consequuntur voluptatum
    </p>
    <button type="button" class="btn button-banner">Book Now</button>
</div>
  <!-- Background image -->

  <div class="container wrapper-heading">
    <div class="row mt-5">
        <div class="col-12 col-md-10 mx-auto">
            <h2 class="page-title text-center">Recent Projects</h2>
        </div>
        <div class="col-12 col-md-2 m-auto form-home-wrapper ">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="GET" class="row form-home">
                <select class="form-select" aria-label="Filter By Date" name="order" id="dateFilter">
                    <option value="start_date" >Start Date </option>
                    <option value="end_date" >End Date </option>
                </select>
            </form>
        </div>
    </div>
    
    <?php 
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
        );
        $query = new WP_Query($args);
        
    
    if ($query -> have_posts()) : ?>
        <div class="row wrapper-home">
            <?php while ($query -> have_posts()) : $query -> the_post(); ?>
                <div class="blog-wrapper col-lg-4 col-md-6 col-sm-12 mb-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="post-image-card" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
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
            <?php endwhile;
                  wp_reset_postdata();
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No content found.', 'textdomain'); ?></p>
    <?php endif; ?>
</div>


<?php
get_footer();