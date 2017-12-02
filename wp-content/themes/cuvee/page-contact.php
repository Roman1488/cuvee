<?php
/**
 * Template Name: Contact page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page-title-wrap">
    <h1 class="page-title"><?php echo get_the_title();?></h1>
</div>
    <div class="contact-section">
        <div class="info">
            <div class="row no-gutters">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="contact-info">
                        <p class="contact-info__address"><?php echo get_field('address', 'option')?></p>
                        <a class="contact-info__tel" href="tel:<?php echo get_field('phone', 'option')?>">
                            <?php echo get_field('phone', 'option')?>
                        </a>
                        <p class="subtitle"><?php _e('Hours', 'cuvee'); ?></p>
                        <?php if (have_rows('hours')): ?>
                            <table class="hours">
                            <?php while (have_rows('hours')) : the_row(); ?>
                                <tr>
                                    <td class="day">
                                    <?php the_sub_field('day'); ?>
                                    </td>
                                    <td class="hour">
                                    <?php the_sub_field('hour'); ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if(get_field('section_image') != '') : ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4  section-image">
                    <img class="img-fluid" src="<?php echo get_field('section_image'); ?>" alt="Contact image">
                </div>
                <?php endif; ?>
                <?php if(get_field('map_shortcode') != '') : ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <?php echo do_shortcode(get_field('map_shortcode')); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if( get_field('contact_form_shortcode') != '' ) : ?>
        <div class="contact-form">
            <div class="container">
                <div class="form-title"><h3 class="subtitle"><?php _e('Inquiries & Questions', 'cuvee'); ?></h3></div>
                <?php echo do_shortcode(get_field('contact_form_shortcode'))?>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>