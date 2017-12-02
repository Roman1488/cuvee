<?php
/**
 * Template Name: About page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="page-title-wrap">
        <h1 class="page-title"><?php echo get_the_title();?></h1>
    </div>
    <div class="page-head bg-gray">
        <div class="container container-xl-wrapper">
            <div class="row justify-content-md-center justify-content-sm-center about-row-wrapper align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 about-text-wrapper">
                    <h2 class="subtitle"><?php echo get_field('head_title') ?></h2>
                    <div class="page-head__content">
                        <?php echo get_field('head_text') ?>
                    </div>

                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 offset-lg-0 col-xl-4 about-image-wrapper">
                    <?php echo wp_get_attachment_image( get_post_thumbnail_id(get_the_ID()), 'middle',false, ['class' => 'img-fluid']  );?>
                </div>
            </div>
        </div>
    </div>
    <div class="container about-text container-xl-wrapper">
        <div class="the_content the_content--small">
            <?php the_content(); ?>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>