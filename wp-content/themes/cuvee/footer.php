<footer class="footer">
    <div class="container container-xl-wrapper">
        <div class="row justify-content-md-center align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="contact-info">
                    <p class="contact-info__address"><?php echo get_field('address', 'option')?></p>
                    <a class="contact-info__tel" href="tel:<?php echo get_field('phone', 'option')?>">
                        <?php echo get_field('phone', 'option')?>
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="footer-logo">
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_field('footer_logo', 'option')?>" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="social">
                    <a class="social_item social_item--facebook" target="_blank" href="<?php echo get_field('facebook_url', 'option')?>"></a>
                    <a class="social_item social_item--twitter" target="_blank" href="<?php echo get_field('twitter_url', 'option')?>"></a>
                    <a class="social_item social_item--instagram" target="_blank" href="<?php echo get_field('instagram_url', 'option')?>"></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>