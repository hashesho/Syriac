<?php get_header(); ?>

<section>
    <div class="container" data-aos="fade-up">
        <div class="section-title pb-2">
            <p><?php pll_e("Latest Decisions")  ?></p>
        </div>
        <div class="row px-sm-5 text-center">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'scout-decisions',
                'posts_per_page' => 6,
            );
            $arr_posts = new WP_Query($args);

            if ($arr_posts->have_posts()) :

                while ($arr_posts->have_posts()) :
                    $arr_posts->the_post();
            ?>

                    <div class="col-lg-4 col-md-6 mt-4">

                        <div class="height-180 img-hover overflow-hidden rounded">
                            <img src="<?php echo catch_first_image() ?>" class="img-fluid" alt="">
                        </div>
                        <p class="d-flex justify-content-start tag small">
                            <time class="text-gray"><?php echo get_the_date() ?></time>
                            <span class="px-3 hover-link">
                                <?php the_tags('<i class="fas fa-hashtag"></i> ', ' <i class="fas fa-hashtag"></i> ') ?>
                            </span>
                        </p>
                        <p>
                            <a href="<?php the_permalink(); ?>" class="text-dark hover-link">
                                <h4 class="ps-3 font-weight-bold"><?php the_title() ?></h4>
                            </a>
                        </p>
                    </div>

                <?php endwhile; ?>

        </div>
        <div class="text-center">
            <a href="<?php echo get_home_url() . "/category/all-news/"  ?>" class="button-btn scrollto text-black px-5 mt-5">All News</a>
        </div>
    </div>
<?php
            else :
                echo '<p>There Are no posts</p>';
            endif;

            wp_reset_postdata();
?>
<?php
?>
</section>
<section class="pt-0">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>Latest Meetings</p>
        </div>

        <div class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <?php
                    $args['category_name'] = 'scout-meetings';

                    $arr_posts = new WP_Query($args);

                    if ($arr_posts->have_posts()) :
                        $i = 0;
                        while ($arr_posts->have_posts()) :
                            $arr_posts->the_post();
                    ?>
                            <div class="carousel-item <?php if ($i == 0) : ?>active<?php endif;
                                                                                $i++; ?>">
                                <div class="col-lg-6">
                                    <img src="<?php echo  catch_first_image() ?>" class="w-100" alt="...">
                                </div>
                                <div class="col-lg-6 px-lg-5 pt-lg-0 pt-4 position-relative">
                                    <h3 class="fw-bold"><a class="text-dark hover-link" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                                    <p class="mt-3"><?php the_excerpt() ?></p>
                                    <div class="d-flex justify-content-end">
                                        <a href="<?php the_permalink() ?>" class="button-btn scrollto text-black me-0 mt-5 position-lg-absolute bottom-0 z-index-50">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                </div>
            </div>
            <div class="text-center">
                <a href="<?php echo get_home_url() . "/category/scout-meetings/"  ?>" class="button-btn scrollto text-black px-5 mt-5">All Meetings</a>
            </div>
        </div>
    <?php
                    else :
                        echo '<p>There Are no posts</p>';
                    endif;
                    wp_reset_postdata();

    ?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    </div>
</section>

<section class="bg-dark">
    <div class="container" data-aos="zoom-in">

        <div class="text-center text-white">
            <div class="row">
                <div class="col-4">
                    <h1><i class="fas fa-user"></i><span class="px-3">+1,900</span></h1>
                    <h1>Active Members</h1>
                </div>
                <div class="col-4">
                    <h1><i class="fa fa-campground"></i><span class="px-3">14</span></h1>
                    <h1>Groups</h1>
                </div>
                <div class="col-4">
                    <h1><i class="far fa-clock"></i><span class="px-3">+6,520</span></h1>
                    <h1>Service Hours</h1>
                </div>
            </div>
        </div>

    </div>
</section>
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>Latest Activities</p>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            $args['category_name'] = 'scout-activities';
            $args['posts_per_page'] = 9;

            $arr_posts = new WP_Query($args);

            if ($arr_posts->have_posts()) :
                $i = 0;
                while ($arr_posts->have_posts()) :
                    $arr_posts->the_post();
            ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="<?php echo catch_first_image() ?>" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4><a href="<?php the_permalink() ?>" class="small mt-3 p-2 text-white hover-link"><?php the_title() ?></a></h4>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo get_home_url() . "/category/scout-activities/"  ?>" class="button-btn scrollto text-black px-5 mt-5">All Activities</a>
    </div>
<?php
            else :
                echo '<p>There Are no posts</p>';
            endif;

            wp_reset_postdata();

?>

</section>

<section>
    <div class="container mt-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <?php
            $args1 = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'p' => '157',
            );

            $arr_posts1 = new WP_Query($args1);

            if ($arr_posts1->have_posts()) :
                while ($arr_posts1->have_posts()) :
                    $arr_posts1->the_post();
            ?>
                    <div class="col-lg-10 col-md-10">
                        <div class="h6 mt-3 text-align px-4"><?php the_content() ?></div>
                    </div>
            <?php endwhile;
            endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>