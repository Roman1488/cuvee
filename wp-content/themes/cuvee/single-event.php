<?php get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
    <div class="page-title-wrap">
        <h1 class="page-title"><?php _e('Events & Specials', 'cuvee'); ?></h1>
    </div>
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="article-info">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), array(235, 360),false, ['class' => 'single-image']  );?>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="article-title <?php echo get_field('background_color', $event->ID) ?>">
                            <h2 class="event-name"><?php echo get_the_title(); ?></h2>
                            <p class="event-date"><?php echo get_field('event_date', get_the_ID()) ?></p>
                            <div class="event-desc"><?php echo the_excerpt(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="the_content the_content--small article-text">
                <?php echo the_content(); ?>
            </div>


        <?php endwhile; ?>
    </div>
<?php get_footer(); ?>