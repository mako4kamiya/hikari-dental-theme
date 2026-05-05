<?php
    get_header();
    $slug = get_post_field('post_name', get_the_ID());
    $shoulder = ucwords(str_replace('-', ' ', $slug));
?>
<main id="page-<?php echo esc_attr($slug); ?>" class="light-mode">
    <header id="entry-header">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder"><?php echo esc_html($shoulder); ?></p>
                    <h1 class="text-style-h1"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </header>
    <?php get_template_part('template-parts/page', $slug); ?>
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>