const swiper = new Swiper('.home .swiper-container', {
  slidesPerView: 3,
  spaceBetween: 20,
  freeMode: true,
  scrollbar: {
    el: '.home .swiper-scrollbar',
    draggable: true,
  },
});


const swiper_s = new Swiper('.search .swiper-container', {
  slidesPerView: 5,
  spaceBetween: 15,
  slidesPerGroup: 5,
  pagination: {
    el: '.search .swiper-pagination'
  }
});

const swiper_single = new Swiper('.single-product .swiper-container', {
  slidesPerView: 5,
  spaceBetween: 15,
  slidesPerGroup: 5,
  pagination: {
    el: '.search .swiper-pagination'
  }
});
