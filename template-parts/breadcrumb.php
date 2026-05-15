<section id="breadcrumb">
    <div class="container">
        <div class="inner_container">
            <nav aria-label="パンくずリスト">
                <ol class="breadcrumb-list">
                    <li><a class="text-style-a-regular" href="<?php echo home_url(); ?>">ホーム</a></li>
                    <?php if ( !is_archive() && !is_category() && have_posts() ) : ?>
                        <li class="text-style-p-regular" aria-current="page"><?php the_title(); ?></li>
                    <?php endif; ?>
                </ol>
            </nav>
        </div>
    </div>
</section>