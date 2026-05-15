<?php
    get_header();
    $post_type_obj = get_queried_object();
    $post_type_name = $post_type_obj->name;
?>
<main id="archive-<?php echo esc_attr($post_type_name); ?>" class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    <?php get_template_part('template-parts/archive', $post_type_name); ?>
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>