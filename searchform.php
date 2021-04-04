<form id="search-form" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" id="search-input" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
    <input type="hidden" name="max-results" value="8" />
    <input id="search-submit" type="submit" value="&#xf002" />
</form>