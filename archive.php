<?php
    get_header();
    $post_type_obj = get_queried_object();
    $post_type_name = $post_type_obj->name;
?>
<main id="archive-<?php echo esc_attr($post_type_name); ?>" class="light-mode">
    <header id="entry-header">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder"><?php echo esc_html($post_type_name); ?></p>
                    <h1 class="text-style-h1"><?php echo post_type_archive_title(); ?></h1>
                </div>
            </div>
        </div>
    </header>
    <?php get_template_part('template-parts/archive', $post_type_name); ?>
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>