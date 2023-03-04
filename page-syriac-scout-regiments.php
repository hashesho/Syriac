<?php get_header(); ?>


<section>
    <div class="container mt-5" data-aos="fade-up">
        <div class="section-title pb-2 text-center mt-5">
            <p>Syrian Syriac Scout Regiment</p>
        </div>
        <div class="row px-sm-5 text-center">
            <?php $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'scout-regiments',
            );
            $arr_posts = new WP_Query($args);

            if ($arr_posts->have_posts()) :

                while ($arr_posts->have_posts()) :
                    $arr_posts->the_post();
            ?>

                    <div class="col-lg-4 col-md-6 mt-4">

                       <div class="img-hover overflow-hidden rounded">
                           <img src="<?php echo catch_first_image() ?>" class="img-fluid" alt="">
					
                        </div>
                        <p>
                            <a href="<?php the_permalink(); ?>" class="text-dark hover-link">
                                <h4 class="ps-3 font-weight-bold text-uppercase"><?php the_title() ?></h4>
                            </a>
                        </p>
                    </div>

                <?php endwhile; ?>

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

<?php get_footer(); ?>