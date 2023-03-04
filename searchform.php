<form role="search" method="get" class="search-form nav-link px-0" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"></span>
        <input type="search" class="search-field form-control w-165" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
    </label>
    <button type="submit" class="search-submit vertical-inherit btn btn-warning"><i class="fas fa-search"></i></button>
</form>