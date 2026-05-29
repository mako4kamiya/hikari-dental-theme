const BannerClose = document.querySelector('button.banner-close');
const NotificationBanner = document.querySelector('.notification-banner'); 

// 1. ページ読み込み時に初回訪問かどうかを判定
window.addEventListener('DOMContentLoaded', () => {
    // 過去に「閉じる」を押した記録（LocalStorage）がない場合だけ表示する
    if (!localStorage.getItem('banner_closed')) {
        NotificationBanner.classList.remove('hidden');
    }
});

// 2. 閉じるボタンをクリックした時の処理
BannerClose.addEventListener('click', () => {
    NotificationBanner.classList.add('hidden'); 
    // LocalStorageに「閉じた記録」を保存する
    localStorage.setItem('banner_closed', 'true');
});
