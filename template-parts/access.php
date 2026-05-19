
<div id="access">
    <div class="clinic_info">
        <div class="headings clinic_name">
            <h2 class="text-style-h2">
                <?php bloginfo('name'); ?>
            </h2>
        </div>
        <div class="clinic_address">
            <p class="text-style-p-regular">
                〒<?php echo esc_html(get_option('clinic_postal_code')); ?>
                <?php echo esc_html(get_option('clinic_address')); ?>
            </p>
            <p class="text-style-p-regular">
                最寄り駅: <?php echo esc_html(get_option('clinic_nearest_station')); ?>
            </p>
        </div>
    </div>
    <div class="access_map">
        <?php echo get_option('clinic_map'); ?>
    </div>
</div>