<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
    <input type="search" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Найти путешествие"/>
    <input type="hidden" name='post_type' value='trip'>
    <button type="submit"><i class="fas fa-search"></i></button>
</form>