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
