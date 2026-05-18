<?php
    $current_page    = get_my_entry_title();
?>
<section id="breadcrumb">
    <div class="container">
        <div class="inner_container">
            <nav aria-label="パンくずリスト">
                <ol class="breadcrumb-list">
                    <li><a class="text-style-a-regular" href="<?php echo home_url(); ?>">ホーム</a></li>
                    <li class="text-style-p-regular" aria-current="page"><?php echo esc_html( $current_page ); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</section>