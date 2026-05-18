<?php
    get_header();
    $post_type_obj = get_queried_object();
    $post_type_name = $post_type_obj->name;
?>
<main id="archive-<?php echo esc_attr($post_type_name); ?>" class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>
    
    <?php if (have_posts()) : ?>
        <section>
            <div class="container">
                <div class="inner_container">
                    <ul>
                    <?php while (have_posts()) : the_post(); ?>
                        <li id="<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="card">
                                <div class="headings">
                                    <h3 class="text-style-h2"><?php the_title(); ?></h3>
                                </div>
                                <p class="text-style-p-regular">
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>
<?php get_footer(); ?>