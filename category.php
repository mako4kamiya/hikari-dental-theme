<?php get_header(); ?>

<main class="light-mode">
    <?php get_template_part('template-parts/header-entry'); ?>

    <section id="main-section">
        <div class="container">
            <div class="inner_container">
                <?php if (have_posts()) : ?>
                    <ul>
                    <?php while (have_posts()) : the_post(); ?>
                        <li id="<?php the_ID(); ?>">
                            <a href="<?php the_permalink(); ?>" class="text-style-a-regular">
                                <?php echo get_the_date('Y.m.d'); ?>　<?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p class="news-no-posts-text">現在、お知らせはございません。</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/breadcrumb'); ?>
</main>

<?php get_footer(); ?>