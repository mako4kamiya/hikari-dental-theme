<?php
function get_notification_icons() {
    return array(
        'success'   => '<svg class="notification-icon" width="36" height="36" viewBox="0 0 36 36" fill="currentColor"><circle cx="18" cy="18" r="18" fill="#F4F1EC"/><path d="M18 0C8.064 0 0 8.064 0 18C0 27.936 8.064 36 18 36C27.936 36 36 27.936 36 18C36 8.064 27.936 0 18 0ZM14.4 27L5.4 18L7.938 15.462L14.4 21.906L28.062 8.244L30.6 10.8L14.4 27Z" fill="currentColor"/></svg>',
        'error'     => '<svg class="notification-icon" width="36" height="36" viewBox="0 0 36 36" fill="currentColor"><path d="M24.2529 3L33 11.7471V24.2529L24.2529 33H11.7471L3 24.2529V11.7471L11.7471 3H24.2529Z" fill="currentColor" stroke="currentColor" stroke-width="2"/><rect width="2" height="18.5341" transform="matrix(0.7071 -0.707113 0.7071 0.707113 11 12.4142)" fill="#F4F1EC"/><rect width="2" height="18.5341" transform="matrix(-0.7071 -0.707113 0.7071 -0.707113 12.4141 25.52)" fill="#F4F1EC"/></svg>',
        'warning'   => '<svg class="notification-icon" width="36" height="36" viewBox="0 0 36 36" fill="currentColor"><path d="M18 3.00098L36 34.091H0L18 3.00098Z" fill="#F4F1EC"/><path d="M0 34.0909H36L18 3L0 34.0909ZM19.6364 29.1818H16.3636V25.9091H19.6364V29.1818ZM19.6364 22.6364H16.3636V16.0909H19.6364V22.6364Z" fill="currentColor"/></svg>'
    );
}
