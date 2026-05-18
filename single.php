<?php get_header(); ?>

<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>

    <section id="main-section">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_post_thumbnail(); ?>
            <div class="container">
                <div class="inner_container">
                    <?php if ( get_post_type() === 'information' ) : ?>
                    <div class="entry-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>
        <?php endwhile; endif; ?>
    </section>
    
    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>

<?php get_footer(); ?>