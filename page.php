<?php
    get_header();
    $slug = get_post_field('post_name', get_the_ID());
    $shoulder = ucwords(str_replace('-', ' ', $slug));
?>
<main id="page-<?php echo esc_attr($slug); ?>" class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    <?php get_template_part('template-parts/page', $slug); ?>
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>