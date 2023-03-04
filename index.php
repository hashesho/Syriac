<?php get_header(); ?>
<?php
$title = get_queried_object()->slug;
?>

<div class="container">
    <?php if (is_search()) : ?>
        <h1 class="mt-150 fw-bold text-capitalize">Search results for: <?php the_search_query() ?></h1>
    <?php else : ?>
        <h1 class="mt-150 fw-bold text-capitalize"><?php echo get_the_archive_title(  ); ?></h1>
    <?php endif ?>

    <div class="row mt-5">
        <div class="col-lg-7 order-lg-0 order-1">
            <?php $count = $GLOBALS["wp_query"]->found_posts; ?>
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <div class="img-hover">
                                <img src="<?php echo catch_first_image() ?>" alt="" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-md-8 border-bottom">
                            <p class="d-flex mb-0 justify-content-start align-items-center tag small">
                                <time class="text-gray"><?php echo get_the_date() ?></time><?php if (has_tag()) : ?><span class="px-2 h4 mb-0">|</span><?php endif; ?>
                                <span class="hover-link">
                                    <?php the_tags('<i class="fas fa-hashtag"></i> ', ' <i class="fas fa-hashtag"></i> ') ?>
                                </span>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="text-dark hover-link">
                                <h4 class="fw-bold"><?php the_title() ?></h4>
                            </a>
                            <p class="h6 text-align">
                                <?php echo get_the_excerpt() ?>
                            </p>
                        </div>
                    </div>
            <?php endwhile;
            else :
                echo '<h5 class="mb-5 pb-5">Sorry, No posts match your search</h5>';
            endif;

            ?>
        </div>
        <div class="col-lg-1"></div>

            <div class="col-lg-4 px-lg-4 order-lg-0 order-0 space-y-4 mb-5">
                <h4 class="fw-bold"><?php echo ($count) ?> Articles</h4>
                <div class="mt-4">
                    <label class="fw-bold">Search</label>
                    <div>
                        <?php get_search_form(  ) ?>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="fw-bold">Categories</label>
                    <ul class="list-unstyled px-3 categories">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>
                </div>
                <div class="mt-4">
                    <label class="fw-bold">Hashtags</label>
                    <ul class="list-unstyled px-3">
                        <?php
                        $tags = get_tags('post_tag');

                        if ($tags) :
                            foreach ($tags as $tag) : ?>
                                <li class="<?php if ($title === strtolower($tag->name)) echo "current-cat" ?> p-1 rounded"><a class="tag" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" title="<?php echo esc_attr($tag->name); ?>"><?php echo esc_html($tag->name); ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

    </div>
    <?php echo paginate_links(array(
        "before_page_number" => "<span class='btn btn-border border-warning mr-2 mb-2'>",
        "after_page_number" => "</span>",
    )) ?>
</div>

<?php get_footer(); ?>