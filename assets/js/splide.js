const splide = new Splide( '.splide', {
  type      : 'loop',
  perPage   : 3,
  perMove   : 1,
  gap       : '2rem',
  pagination: false,
  breakpoints: {
    768: {
      destroy: true
    },
  }
} );

// 1. カウンターを更新する関数
function updateCounter() {
  const counter = splide.root.querySelector( '.counter' );
  if ( counter ) {
    counter.textContent = `${ splide.index + 1 } / ${ splide.length }`;
  }
}

// 2. 矢印が作られたら、その間にカウンターを差し込む
splide.on( 'arrows:mounted', function () {
  const prevButton = splide.root.querySelector( '.splide__arrow--prev' );
  if ( prevButton ) {
    prevButton.insertAdjacentHTML( 'afterend', '<span class="counter text-style-p-regular"></span>' );
  }
} );

// 3. 初期化時と移動時に表示を更新
splide.on( 'mounted move', updateCounter );

splide.mount();