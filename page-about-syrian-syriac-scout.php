<?php get_header(); ?>
<section>

    <div class="container mt-5">
        <div class="row justify-content-center mb-5">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-lg-8 col-md-10">
                    <h1 class="text-center mb-5 text-uppercase"><?php the_title(); ?></h1>
                    <div class="img-hover">
                        <a href="<?php echo catch_first_image() ?>" data-gallery="portfolioGallery" class="portfolio-lightbox">
                            <img src="<?php echo catch_first_image() ?>" class="img-fluid" alt="">
                        </a>
                    </div>
                    <p class="text-justify"><?php echo get_content_text() ?></p>
                </div>
        </div>
    <?php endwhile ?>
    </div>
</section>

<?php get_footer(); ?>