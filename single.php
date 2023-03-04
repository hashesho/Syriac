<?php get_header(); ?>

<section>
    <div class="container mt-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <?php
            $category = get_the_category()[0]->name;
            while (have_posts()) : the_post(); ?>

                <div class="col-lg-10 col-md-10">
                    <div class="text-center">
                        <h1 class="fw-bold <?php if ($category == "Scout Regiments") : echo "mb-5"; endif;?>"><?php the_title() ?></h1>
                        <?php if ($category != "Scout Regiments") : ?>
                            <p class="d-flex justify-content-center tag small">
                                <time class="text-gray">Published Date: <?php echo get_the_date() ?></time>
                                <span class="px-3 hover-link">
                                    <?php the_tags('<i class="fas fa-hashtag"></i> ', ' <i class="fas fa-hashtag"></i> ') ?>
                                </span>
                            </p>
                        <?php endif ?>
                    </div>
                    <section id="portfolio" class="portfolio py-0">
                        <div class="container" data-aos="fade-up">
                            <div class="row" data-aos="fade-up" data-aos-delay="200">
                                <?php
                                $args = array(
                                    'post_parent'    => $post->ID,
									'post_type'      => 'attachment',
									'numberposts'    => -1,
									'post_status'    => 'any',
									'post_mime_type' => 'image',
									'orderby'        => 'menu_order',
									'order'           => 'ASC'
                                );
                                $attached_images = get_posts($args);
                                $count = count($attached_images);
								echo($count);
                                foreach ($attached_images as $image) {
                                ?>
                                    <div class="<?php if ($count == 1) echo "col-12";
                                                elseif ($count == 2) echo "col-lg-6";
                                                else echo "col-lg-4 col-md-6 " ?> portfolio-item filter-app">
                                        <div class="img-hover text-center">
                                            <a href="<?php echo $image->guid ?>" data-gallery="portfolioGallery" class="portfolio-lightbox">
                                                <img src="<?php echo $image->guid ?>" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </section>
                    <div class="h6 mt-3 text-align px-4"><?php echo get_content_text() ?></div>
                </div>
        </div>
    </div>

<?php endwhile; ?>
</section>

<?php get_footer(); ?>