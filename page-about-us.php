<?php
    get_header();
    $slug = get_post_field( 'post_name', get_post() );
?>
<main id="<?php echo esc_attr( $slug ); ?>" class="light-mode">
    <section id="title">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <p class="text-style-shoulder">Information</p>
                    <h1 class="text-style-h1"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>
    <section id="">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class=""></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class=""></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class=""></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class=""></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="">
        <div class="container">
            <div class="inner_container">
                <div class="headings">
                    <h2 class=""></h2>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>