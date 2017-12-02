<?php
/**
 * Template Name: Events & Specials page template
 */
get_header(); ?>
<?php get_template_part('template-part/subheader'); ?>
<div class="page-title-wrap">
    <h1 class="page-title"><?php echo get_the_title();?></h1>
</div>
<?php
$args = array(
    'post_type' => 'event',
    'posts_per_page' => -1
);
$events = query_posts($args);
$today = date("F j, g:i a");
$upcomingEvents = [];
$pastEvents = [];
if (count($events) > 0) :
    foreach ($events as $event) :
        $eventDate = get_field('event_date', $event->ID);
        if($eventDate < $today) {
            $upcomingEvents[] = $event;
        } else {
            $pastEvents[] = $event;
        }
    endforeach; endif; ?>
<?php if(!empty($upcomingEvents)) : ?>
<div class="upcoming-events">
    <div class="container container-xl-wrapper">
        <h2 class="subtitle subtitle--center"><?php _e('Upcoming Events', 'cuvee'); ?></h2>
        <div class="row no-gutters upcoming-event-list">
            <?php foreach ($upcomingEvents as $event) : ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 event-item-wrapper reval">
                <div class="event-item">
                    <a class="event-item__link" href="<?php echo get_post_permalink($event->ID) ?>">
                        <img class="event-item__img img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($event->ID) );?>" alt="<?php echo $event->post_title; ?> image">
                    </a>
                    <div class="event-item__desc <?php echo get_field('background_color', $event->ID) ?>">
                        <a href="<?php echo get_post_permalink($event->ID) ?>">
                            <p class="event-name event-name--white"><?php echo $event->post_title; ?></p>
                        </a>
                        <p class="event-date event-date--white"><?php echo get_field('event_date', $event->ID) ?></p>
                        <p class="event-desc event-desc--white">
                            <?php echo $event->post_excerpt; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if(!empty($pastEvents)) : ?>
<div class="past-events">
    <div class="container container-xl-wrapper">
        <h2 class="subtitle subtitle--center"><?php _e('Past Events', 'cuvee'); ?></h2>
        <div class="row no-gutters upcoming-event-list">
            <?php foreach ($pastEvents as $event) : ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 event-item-wrapper reval">
                <div class="event-item">
                    <a class="event-item__link" href="<?php echo get_post_permalink($event->ID) ?>">
                        <img class="event-item__img img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($event->ID) );?>" alt="<?php echo $event->post_title; ?> image">
                    </a>
                    <div class="event-item__desc <?php echo get_field('background_color', $event->ID) ?>">
                        <a href="<?php echo get_post_permalink($event->ID) ?>">
                            <p class="event-name event-name--white"><?php echo $event->post_title; ?></p>
                        </a>
                        <p class="event-date event-date--white"><?php echo get_field('event_date', $event->ID) ?></p>
                        <p class="event-desc event-desc--white">
                            <?php echo $event->post_excerpt; ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php get_footer(); ?>
