new Splide( '.splide', {
  type   : 'loop',
  perPage: 3,
  perMove: 1,
  gap    : '2rem',
  classes: {
    arrows: 'splide__arrows',
		arrow : 'splide__arrow arrow',
		prev  : 'splide__arrow--prev prev',
		next  : 'splide__arrow--next next',
    pagination: 'splide__pagination pagination',
    page      : 'splide__pagination__page page',
  },
} ).mount();