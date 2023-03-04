<?php get_header(); ?>

<section>
    <div class="container mt-5" data-aos="fade-up">
        <div class="row justify-content-center">
            <?php
            $category = get_the_category()[0]->name;
            while (have_posts()) : the_post(); ?>
                <div class="col-lg-10 col-md-10">
                    <div class="text-center">
                        <h1 class="fw-bold"><?php the_title() ?></h1>
                    </div>
                    <div class="h6 mt-3 text-align px-4"><?php the_content() ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>