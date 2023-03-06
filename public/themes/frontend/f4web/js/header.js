const menuModal = document.querySelector("#header .m-menu .m-menu-modal");

const openMenu = () => {
  menuModal.style.transform = "translateX(0)";
};

const closeMenu = () => {
  menuModal.style.transform = "translateX(100%)";
};

$(function(){
  var showSlide = function(){
    $('#banner .swiper.banner-m .swiper-slide').css('display','flex');
  };
  setTimeout(showSlide, 3000);
  // var showImage = function(){
  //   $('#project .project-item-img.home-project').css('display','block');
  // };
  // setTimeout(showImage, 2000);
});
