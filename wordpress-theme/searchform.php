<form id="searchform" class="sidebar__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="sidebar__form-title sidebar-title">
        <label for="sidebar__form-search"><?php esc_html_e('Type to search', 'noiceland') ?></label>
    </div>
    <div class="sidebar__form-inputs">
        <input id="sidebar__form-search" class="sidebar__form-input input-email search-field" name="s" type="search" placeholder="Type ..." value="<?php echo get_search_query(); ?>">
        <input id="sidebar__form-submit" class="sidebar__form-input input-submit" type="submit" value="Search">
    </div>
</form>