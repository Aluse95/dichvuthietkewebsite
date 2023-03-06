const swiperLoop = new Swiper(
  "#banner .banner-m, #client .swiper.client-m, #client-home .swiper.client-m, #people .people-leader .people-leader-m, #people .people-employee .swiper, #testimonials .testimonials-m",
  {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 3000,
    },
    pagination: {
      el: ".swiper-pagination",
      type: "bullets",
    },
  }
);

const swiper = new Swiper(".m-category.swiper, #vision .swiper", {
  direction: "horizontal",
  autoplay: {
    delay: 3000,
  },

  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const bannerSwiper = new Swiper(" #banner .banner-p", {
  // Optional parameters
  direction: "horizontal",
  slidesPerView: 3,
  spaceBetween: 200,
  loop: true,
  autoplay: {
    delay: 3000,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});

const clientSwiper = new Swiper("#client .swiper.client-pc", {
  direction: "horizontal",
  slidesPerView: 6,
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const clientHomeSwiper = new Swiper("#client-home .swiper.client-pc", {
  direction: "horizontal",
  slidesPerView: 6,
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});

const testimonialsSwiper = new Swiper("#testimonials .testimonials-p", {
  direction: "horizontal",
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const pointSwiper = new Swiper("#point .point-m .swiper", {
  direction: "horizontal",
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const pointSwiper2 = new Swiper("#point-seo .point-m .swiper", {
  direction: "horizontal",
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const pointSwiper3 = new Swiper("#point-content .point-m .swiper", {
  direction: "horizontal",
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const blogSwiper = new Swiper("#blog .blog-m .swiper", {
  direction: "horizontal",
  spaceBetween: 30,
  loop: true,
  autoplay: { delay: 3000 },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});
const peopleSwiper = new Swiper("#people .people-leader .people-leader-p", {
  // Optional parameters
  direction: "horizontal",
  slidesPerView: 3,
  spaceBetween: 200,
  loop: true,
  autoplay: {
    delay: 3000,
  },
  pagination: {
    el: ".swiper-pagination",
    type: "bullets",
  },
});