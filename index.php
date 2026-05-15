<?php get_header(); ?>
<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    <section>
        <div class="container">
            <div class="inner_container">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>