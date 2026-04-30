<?php
    get_header();
    $slug = get_post_field('post_name', get_the_ID());
    $shoulder = ucwords(str_replace('-', ' ', $slug));
?>
<main id="page-<?php echo esc_attr($slug); ?>" class="light-mode">
    <section id="title">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder"><?php echo esc_html($shoulder); ?></p>
                    <h1 class="text-style-h1"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/page', $slug); ?>
</main>
<?php get_footer(); ?>