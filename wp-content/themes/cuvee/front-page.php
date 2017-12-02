<?php get_header(); ?>
<?php global $wp_post?>
    <div class="head-background">
        <div class="container-fluid">
            <section class="intro">
                    <div class="logo reval">
                        <img class="img-fluid" src="<?php echo get_field('home_logo')?>" alt="Logo">
                    </div>
                    <div class="intro-image reval">
                        <?php echo wp_get_attachment_image( get_field('hero_image'), 'full', false ) ?>
                    </div>
                    <div class="quote-wrapper reval">
                        <p class="before-quote"><?php echo get_field('before_quote_text')?></p>
                        <p class="quote"><?php echo get_field('quote')?></p>
                        <p class="quote-author"><?php echo get_field('quote_author')?></p>
                    </div>
            </section>
        </div>
    </div>
    <div class="container container-xl-wrapper">
        <section class="events">
                <div class="main-event reval">
                    <div class="row no-gutters row-eq-height">
                        <?php if(get_field('main_event') != '') {
                            $main_post = get_post(get_field('main_event'));
                        }?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="main-event__image">
                                <img class="img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($main_post->ID) );?>" alt="<?php echo $main_post->post_title; ?> image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="main-event__desc">
                                <a href="<?php echo get_post_permalink($main_post->ID) ?>">
                                    <p class="event-name"><?php echo $main_post->post_title; ?></p>
                                </a>
                                <p class="event-date"><?php echo get_field('event_date', $main_post->ID) ?></p>
                                <p class="event-desc"><?php echo $main_post->post_excerpt; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="page-subtitle"><?php _e('Events & Specials', 'cuvee'); ?></h3>
                <div class="upcoming-event-wrapper reval">
                    <?php
                    $args = array(
                        'post_type'         => 'event',
                        'posts_per_page'    => -1,
                        'meta_key'			=> 'event_date',
                        'orderby'			=> 'meta_value',
                        'order'				=> 'ASC'
                    );
                    $events = query_posts($args);
                    $counter = 0;
                    $today = date("F j, g:i a");
                    if (count($events) > 0) : ?>
                    <div class="row no-gutters upcoming-event-list">
                        <?php foreach ($events as $event) :
                            $eventDate = get_field('event_date', $event->ID);
                        if($counter < 3) :
                            if($eventDate > $today) :

                            ?>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                                <div class="event-item">
                                    <a class="event-item__link" href="<?php echo get_post_permalink($event->ID) ?>">
                                        <img class="event-item__img img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($event->ID) );?>" alt="<?php echo $event->post_title; ?> image">
                                    </a>
                                    <div class="event-item__desc">
                                        <a href="<?php echo get_post_permalink($event->ID) ?>">
                                            <p class="event-name"><?php echo $event->post_title; ?></p>
                                        </a>
                                        <p class="event-date"><?php echo get_field('event_date', $event->ID) ?></p>
                                        <p class="event-desc">
                                            <?php echo $event->post_excerpt; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $counter++;
                            endif;
                            endif;
                            endforeach;
                            wp_reset_query(); ?>
                    </div>
                    <?php endif; ?>
                </div>
        </section>
    </div>

<?php get_footer(); ?>
