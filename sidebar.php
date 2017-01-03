    <?php if( is_home() || is_archive() || is_category() || is_tag() || is_single() || is_search() || is_404() ): ?>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sosq_blog')); ?>
    <?php endif; ?>
    <?php if( is_page() ): ?>
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sosq_pages')); ?>
    <?php endif; ?>
    