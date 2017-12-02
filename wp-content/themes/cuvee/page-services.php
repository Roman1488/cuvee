<?php
/**
 * Template Name: Services page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="page-title-wrap">
        <h1 class="page-title"><?php echo get_the_title();?></h1>
    </div>
    <?php if (have_rows('services')): ?>
    <div class="container container-l-wrapper">
        <div class="services-list">
            <div class="row row-eq-height services-row">
                <?php while (have_rows('services')) : the_row(); ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 services-item-wrap reval">
                    <div class="services-item">
                        <h2 class="services-item__name subtitle"><?php the_sub_field('service_title'); ?></h2>
                        <div class="content">
                            <?php the_sub_field('service_text'); ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

<?php endwhile; ?>
<?php get_footer(); ?>
