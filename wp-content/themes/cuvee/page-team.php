<?php
/**
 * Template Name: Team page template
 */
?>
<?php get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page-title-wrap">
    <h1 class="page-title"><?php echo get_the_title();?></h1>
</div>
    <?php if (have_rows('team')): ?>
        <div class="team-list">
                <?php while (have_rows('team')) : the_row(); ?>
                    <div class="team-member reval">
                        <div class="container container-md-wrapper">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-8 col-xl-8 team-member__info">
                                    <h2 class="team-member__name subtitle"><?php the_sub_field('team_member_title'); ?></h2>
                                    <div class="team-member__desc content">
                                        <?php the_sub_field('team_member_text'); ?>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 team-member__photo">
                                    <img class="img-fluid" src="<?php the_sub_field('team_member_photo'); ?>" alt="<?php the_sub_field('team_member_title'); ?> image">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
    <?php endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>
